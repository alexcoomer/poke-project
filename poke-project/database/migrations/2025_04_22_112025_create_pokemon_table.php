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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('pokedex_number');
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->foreignId('pre_evolution_id')->nullable()->constrained('pokemon');
            $table->smallInteger('base_hit_points');
            $table->smallInteger('base_attack');
            $table->smallInteger('base_defence');
            $table->smallInteger('base_special_attack');
            $table->smallInteger('base_special_defence');
            $table->smallInteger('base_speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
