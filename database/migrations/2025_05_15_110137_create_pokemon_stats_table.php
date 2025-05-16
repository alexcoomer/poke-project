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
        Schema::create('pokemon_stats', function (Blueprint $table) {
            $table->foreignId('pokemon_id')->constrained('pokemon');
            $table->foreignId('stat_type_id')->constrained('stat_types');
            $table->smallInteger('base_stat');
            $table->smallInteger('effort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_stats');
    }
};
