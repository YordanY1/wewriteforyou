<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed. Please try again.');
        }

        if (!$googleUser->getEmail()) {
            return redirect('/login')->with('error', 'Your Google account has no email address.');
        }

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? 'Google User',
                'password' => bcrypt(Str::random(16)),
                'is_guest' => false,
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user, true);

        return redirect()->route('dashboard');
    }
}
