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
        Schema::create('pokemon_evolutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evolved_species_id')->constrained('pokemon_species');
            $table->foreignId('evolution_trigger_id')->constrained('evolution_triggers');
            $table->foreignId('trigger_item_id')->nullable()->constrained('items');
            $table->smallInteger('minimum_level')->nullable();
            $table->foreignId('gender_id')->nullable()->constrained('genders');
            $table->foreignId('location_id')->nullable()->constrained('locations');
            $table->foreignId('held_item_id')->nullable()->constrained('items');
            $table->foreignId('time_of_day_id')->nullable()->constrained('times_of_day');
            $table->foreignId('known_move_id')->nullable()->constrained('moves');
            $table->foreignId('known_move_type_id')->nullable()->constrained('types');
            $table->smallInteger('minimum_happiness')->nullable();
            $table->smallInteger('minimum_beauty')->nullable();
            $table->smallInteger('minimum_affection')->nullable();
            $table->smallInteger('relative_physical_stats')->nullable();
            $table->foreignId('party_species_id')->nullable()->constrained('pokemon_species');
            $table->foreignId('party_type_id')->nullable()->constrained('types');
            $table->foreignId('trade_species_id')->nullable()->constrained('pokemon_species');
            $table->boolean('needs_overworld_rain');
            $table->boolean('turn_upside_down');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_evolutions');
    }
};
