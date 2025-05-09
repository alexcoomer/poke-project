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
        Schema::create('move_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stat_effect_id')->nullable()->constrained('stat_effects');
            $table->foreignId('item_condition_id')->nullable()->constrained('item_conditions');
            $table->foreignId('status_condition_id')->nullable()->constrained('status_conditions');
            $table->foreignId('weather_condition_id')->nullable()->constrained('weather_conditions');
            $table->foreignId('terrain_condition_id')->nullable()->constrained('terrain_conditions');
            $table->enum('target', ['self', 'opponent'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_conditions');
    }
};
