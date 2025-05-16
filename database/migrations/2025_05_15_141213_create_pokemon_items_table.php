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
        Schema::create('pokemon_items', function (Blueprint $table) {
            $table->foreignId('pokemon_id')->constrained('pokemon');
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('item_id')->constrained('items');
            $table->smallInteger('rarity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_items');
    }
};
