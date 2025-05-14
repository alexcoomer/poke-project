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
        Schema::create('pokemon_species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('generation_id')->constrained('generations');
            $table->foreignId('evolves_from_species_id')->nullable()->constrained('pokemon_species');
            $table->foreignId('evolution_chain_id')->constrained('evolution_chains');
            $table->foreignId('colour_id')->constrained('pokemon_colours');
            $table->foreignId('shape_id')->constrained('pokemon_shapes');
            $table->foreignId('habitat_id')->constrained('pokemon_habitats');
            $table->smallInteger('gender_rate');
            $table->smallInteger('capture_rate');
            $table->smallInteger('base_happiness');
            $table->boolean('is_baby');
            $table->smallInteger('hatch_counter');
            $table->boolean('has_gender_differences');
            $table->foreignId('growth_rate_id')->constrained('growth_rates');
            $table->boolean('forms_switchable');
            $table->boolean('is_legendary');
            $table->boolean('is_mythical');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_species');
    }
};
