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
        Schema::create('pokemon_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pokemon_id')->constrained('pokemon');
            $table->foreignId('move_id')->constrained('moves');
            $table->foreignId('game_group_id')->constrained('game_groups');
            $table->foreignId('pokemon_move_method_id')->constrained('pokemon_move_methods');
            $table->smallInteger('level')->nullable();
            $table->smallInteger('order')->nullable();
            $table->smallInteger('mastery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_moves');
    }
};
