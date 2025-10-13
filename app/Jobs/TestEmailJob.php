<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TestEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        $this->connection = 'database'; 
    }

    public function handle(): void
    {
        Mail::raw('🔥 Test mail from BullWrite queue', function ($m) {
            $m->to('yordanyordanov0104@gmail.com')
                ->subject('Test from Laravel Queue ✅');
        });
    }
}
