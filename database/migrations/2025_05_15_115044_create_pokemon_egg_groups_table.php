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
        Schema::create('pokemon_egg_groups', function (Blueprint $table) {
            $table->foreignId('species_id')->constrained('pokemon_species');
            $table->foreignId('egg_group_id')->constrained('egg_groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_egg_groups');
    }
};
