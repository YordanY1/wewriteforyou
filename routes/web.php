<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\HowItWorksPage;
use App\Livewire\PricingPage;
use App\Livewire\ReviewsPage;
use App\Livewire\AboutPage;
use App\Livewire\ClientRightsPage;
use App\Livewire\ContactPage;
use App\Http\Controllers\PaymentController;
use App\Livewire\Auth\RegisterForm;
use App\Livewire\Auth\LoginForm;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Dashboard;
use App\Livewire\Orders\MyOrders;
use App\Livewire\Orders\ShowOrder;
use App\Livewire\TermsPage;
use App\Livewire\PrivacyPolicyPage;
use App\Livewire\CookiePolicyPage;


Route::get('/', Home::class)->name('home');
Route::get('/how-it-works', HowItWorksPage::class)->name('how-it-works');
Route::get('/pricing', PricingPage::class)->name('pricing');
Route::get('/reviews', ReviewsPage::class)->name('reviews');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/client-rights', ClientRightsPage::class)->name('rights');
Route::get('/contact', ContactPage::class)->name('contact');


Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

Route::get('/terms-and-conditions', TermsPage::class)->name('terms');
Route::get('/privacy-policy', PrivacyPolicyPage::class)->name('privacy-policy');
Route::get('/cookie.policy', CookiePolicyPage::class)->name('cookie.policy');


Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterForm::class)->name('register');
    Route::get('/login', LoginForm::class)->name('login');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/orders', MyOrders::class)->name('orders.my');
    Route::get('/orders/{order}', ShowOrder::class)->name('orders.show');
});
