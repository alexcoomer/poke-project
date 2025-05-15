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
        Schema::create('pokemon_forms', function (Blueprint $table) {
            $table->id();
            $table->string('pokemon_form_name');
            $table->string('form_name');
            $table->foreignId('pokemon_id')->constrained('pokemon');
            $table->foreignId('introduced_in_game_id')->constrained('games');
            $table->boolean('is_default');
            $table->boolean('is_battle_only');
            $table->boolean('is_mega');
            $table->smallInteger('form_order');
            $table->smallInteger('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_forms');
    }
};
