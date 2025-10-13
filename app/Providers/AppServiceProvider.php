<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ChatMessage;
use App\Models\OrderFile;
use App\Models\Order;
use App\Observers\MessageObserver;
use App\Observers\OrderFileObserver;
use App\Observers\OrderObserver;
use App\Observers\ChatMessageObserver;
use Illuminate\Support\Facades\Schema;


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
    public function boot()
    {
        ChatMessage::observe(MessageObserver::class);
        OrderFile::observe(OrderFileObserver::class);
        Order::observe(OrderObserver::class);
        Schema::defaultStringLength(191);
    }
}
