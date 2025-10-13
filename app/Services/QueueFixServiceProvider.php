<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Bus\Dispatcher;
use Illuminate\Contracts\Queue\Factory as QueueFactory;

class QueueFixServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Force Bus dispatcher to always respect ShouldQueue
        $this->app->resolving(Dispatcher::class, function ($dispatcher, $app) {
            $dispatcher->pipeThrough([
                function ($job, $next) use ($app) {
                    $queue = $app[QueueFactory::class];
                    return $job instanceof \Illuminate\Contracts\Queue\ShouldQueue
                        ? $queue->connection()->push($job)
                        : $next($job);
                },
            ]);
        });
    }
}
