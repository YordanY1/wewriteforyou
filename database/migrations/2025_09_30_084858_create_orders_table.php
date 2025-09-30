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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('email')->nullable();

            $table->foreignId('assignment_type_id')->nullable()->constrained('assignment_types')->nullOnDelete();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->foreignId('academic_level_id')->nullable()->constrained('academic_levels')->nullOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->nullOnDelete();
            $table->foreignId('language_id')
                ->nullable()
                ->constrained('languages')
                ->onDelete('set null');
            $table->foreignId('style_id')->nullable()->constrained('styles')->nullOnDelete();

            $table->integer('words')->default(0);
            $table->integer('pages')->default(0);
            $table->enum('deadline_option', ['12h', '24h', '2d', '3d', '5d', '7d'])->default('7d');
            $table->dateTime('deadline_at')->nullable();
            $table->longText('instructions')->nullable();

            $table->enum('status', [
                'draft',
                'awaiting_payment',
                'paid',
                'in_progress',
                'revision_requested',
                'completed',
                'cancelled'
            ])->default('draft');

            $table->decimal('base_price', 8, 2)->default(0);
            $table->decimal('final_price', 8, 2)->default(0);
            $table->foreignId('currency_id')->default(1)->constrained('currencies');

            $table->string('reference_code')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
