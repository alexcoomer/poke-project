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
        Schema::create('natures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('decreased_stat_id')->constrained('stat_types');
            $table->foreignId('increased_stat_id')->constrained('stat_types');
            // TODO: Implement flavours table
            $table->smallInteger('hates_flavour_id');
            $table->smallInteger('likes_flavour_id');
            $table->smallInteger('game_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natures');
    }
};
