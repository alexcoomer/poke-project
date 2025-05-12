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
        Schema::create('item_effect_stat_modifiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_effect_id')->constrained('item_effects');
            $table->foreignId('stat_modifier_id')->constrained('stat_modifiers');
            //TODO: Maybe change 'move_conditions' to a general 'conditions' table and use between moves, abilities and items
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_effect_stat_modifiers');
    }
};
