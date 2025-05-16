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
        Schema::create('user_pokemon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pokemon_id')->constrained('pokemon');
            $table->foreignId('user_id')->constrained('users');
            $table->string('nickname');
            $table->boolean('shiny');
            $table->smallInteger('level');
            $table->foreignId('ability_id')->constrained('abilities');
            $table->foreignId('nature_id')->constrained('natures');
            $table->smallInteger('ivs_hp');
            $table->smallInteger('ivs_attack');
            $table->smallInteger('ivs_defence');
            $table->smallInteger('ivs_special_attack');
            $table->smallInteger('ivs_special_defence');
            $table->smallInteger('ivs_speed');
            $table->smallInteger('evs_hp');
            $table->smallInteger('evs_attack');
            $table->smallInteger('evs_defence');
            $table->smallInteger('evs_special_attack');
            $table->smallInteger('evs_special_defence');
            $table->smallInteger('evs_speed');
            $table->foreignId('item_id')->nullable()->constrained('items');
            $table->foreignId('move_1_id')->nullable()->constrained('moves');
            $table->foreignId('move_2_id')->nullable()->constrained('moves');
            $table->foreignId('move_3_id')->nullable()->constrained('moves');
            $table->foreignId('move_4_id')->nullable()->constrained('moves');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pokemon');
    }
};
