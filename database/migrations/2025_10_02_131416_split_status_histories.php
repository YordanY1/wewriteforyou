<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_status_histories', function (Blueprint $table) {
            $table->enum('old_payment_status', ['unpaid', 'awaiting', 'paid', 'refunded'])->nullable()->after('old_status');
            $table->enum('new_payment_status', ['unpaid', 'awaiting', 'paid', 'refunded'])->nullable()->after('new_status');

            $table->enum('old_order_status', ['draft', 'in_progress', 'revision_requested', 'completed', 'cancelled'])->nullable()->after('old_payment_status');
            $table->enum('new_order_status', ['draft', 'in_progress', 'revision_requested', 'completed', 'cancelled'])->nullable()->after('new_payment_status');
        });

        Schema::table('order_status_histories', function (Blueprint $table) {
            $table->dropColumn(['old_status', 'new_status']);
        });
    }

    public function down(): void
    {
        Schema::table('order_status_histories', function (Blueprint $table) {
            $table->enum('old_status', [
                'draft',
                'awaiting_payment',
                'paid',
                'in_progress',
                'revision_requested',
                'completed',
                'cancelled'
            ])->nullable();

            $table->enum('new_status', [
                'draft',
                'awaiting_payment',
                'paid',
                'in_progress',
                'revision_requested',
                'completed',
                'cancelled'
            ]);

            $table->dropColumn(['old_payment_status', 'new_payment_status', 'old_order_status', 'new_order_status']);
        });
    }
};
