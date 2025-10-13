<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\ChatMessage;
use App\Models\OrderFile;
use App\Models\Order;
use App\Observers\MessageObserver;
use App\Observers\OrderFileObserver;
use App\Observers\OrderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🧩 Fix for key length errors on older MySQL versions
        Schema::defaultStringLength(191);

        // Register model observers
        ChatMessage::observe(MessageObserver::class);
        OrderFile::observe(OrderFileObserver::class);
        Order::observe(OrderObserver::class);
    }
}
