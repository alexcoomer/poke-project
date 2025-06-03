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
        Schema::create('power_static_modifiers', function (Blueprint $table) {
            $table->id();
            $table->decimal('multiplier',2,1)->default(1.0);
            $table->smallInteger('addend')->default(0);
            $table->boolean('is_cumulative')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('power_static_modifiers');
    }
};
