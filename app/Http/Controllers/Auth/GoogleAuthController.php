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
    /**
     * Redirect the user to Google for authentication.
     */
    public function redirect()
    {
        Log::info('Google login redirect initiated.', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback from Google and log in or register the user.
     */
    public function callback()
    {
        Log::info('Google callback hit.', [
            'query' => request()->query(),
        ]);

        try {
            $googleUser = Socialite::driver('google')->user();
            Log::info('Google user data received.', [
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
            ]);
        } catch (\Exception $e) {
            Log::error('Google login failed.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect('/login')->with('error', 'Google login failed. Please try again.');
        }

        // Проверка дали Google е върнал имейл
        if (!$googleUser->getEmail()) {
            Log::warning('Google user has no email.', [
                'google_id' => $googleUser->getId(),
            ]);
            return redirect('/login')->with('error', 'We could not verify your Google account.');
        }

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? 'Unnamed Google User',
                'password' => bcrypt(Str::random(16)),
                'is_guest' => false,
                'email_verified_at' => now(),
            ]
        );

        Log::info('User authenticated/created successfully.', [
            'user_id' => $user->id,
            'email' => $user->email,
            'is_new' => $user->wasRecentlyCreated,
        ]);

        Auth::login($user, true);

        Log::info('User logged in successfully.', [
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard');
    }
}
