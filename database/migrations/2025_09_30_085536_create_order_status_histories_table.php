<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
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
            $table->foreignId('changed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_status_histories');
    }
};
