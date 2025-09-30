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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->integer('words');
            $table->decimal('d7', 8, 2);
            $table->decimal('d3', 8, 2);
            $table->decimal('d2', 8, 2);
            $table->decimal('d1', 8, 2);
            $table->decimal('h12', 8, 2);
            $table->foreignId('currency_id')->default(1)->constrained('currencies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
