<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\HowItWorksPage;
use App\Livewire\PricingPage;
use App\Livewire\ReviewsPage;
use App\Livewire\AboutPage;
use App\Livewire\ClientRightsPage;
use App\Livewire\ContactPage;

Route::get('/', Home::class)->name('home');
Route::get('/how-it-works', HowItWorksPage::class)->name('how-it-works');
Route::get('/pricing', PricingPage::class)->name('pricing');
Route::get('/reviews', ReviewsPage::class)->name('reviews');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/client-rights', ClientRightsPage::class)->name('rights');
Route::get('/contact', ContactPage::class)->name('contact');
