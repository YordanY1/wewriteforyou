<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withCommands([
        App\Console\Commands\GenerateSitemap::class,
    ])
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('sitemap:generate')->dailyAt('00:00');
        $schedule->command('queue:work --stop-when-empty --tries=1 --timeout=60 --memory=128 --no-interaction')->everyMinute();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
