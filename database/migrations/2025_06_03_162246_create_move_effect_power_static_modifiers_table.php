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
        Schema::create('move_effect_power_static_modifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('move_effect_id')->constrained('move_effects');
            $table->foreignId('power_static_modifier_id')->constrained('power_static_modifiers');
            $table->foreignId('target_id')->constrained('targets');
            $table->smallInteger('chance');
            $table->foreignId('battle_condition_id')->nullable()->constrained('battle_conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_effect_power_static_modifiers');
    }
};
