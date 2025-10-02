<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('payment_status', ['unpaid', 'awaiting', 'paid', 'refunded'])
                ->default('unpaid')
                ->after('final_price');

            $table->enum('order_status', ['draft', 'in_progress', 'revision_requested', 'completed', 'cancelled'])
                ->default('draft')
                ->after('payment_status');
        });

        DB::table('orders')->orderBy('id')->chunk(100, function ($orders) {
            foreach ($orders as $order) {
                $payment = 'unpaid';
                $orderStatus = 'draft';

                switch ($order->status) {
                    case 'awaiting_payment':
                        $payment = 'awaiting';
                        $orderStatus = 'draft';
                        break;
                    case 'paid':
                        $payment = 'paid';
                        $orderStatus = 'draft';
                        break;
                    case 'in_progress':
                        $payment = 'paid';
                        $orderStatus = 'in_progress';
                        break;
                    case 'revision_requested':
                        $payment = 'paid';
                        $orderStatus = 'revision_requested';
                        break;
                    case 'completed':
                        $payment = 'paid';
                        $orderStatus = 'completed';
                        break;
                    case 'cancelled':
                        $payment = 'unpaid';
                        $orderStatus = 'cancelled';
                        break;
                }

                DB::table('orders')->where('id', $order->id)->update([
                    'payment_status' => $payment,
                    'order_status'   => $orderStatus,
                ]);
            }
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status', [
                'draft',
                'awaiting_payment',
                'paid',
                'in_progress',
                'revision_requested',
                'completed',
                'cancelled'
            ])->default('draft');

            $table->dropColumn(['payment_status', 'order_status']);
        });
    }
};
