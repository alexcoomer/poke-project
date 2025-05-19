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
        Schema::create('move_machines', function (Blueprint $table) {
            $table->smallInteger('machine_number');
            $table->foreignId('game_group_id')->constrained('game_groups');
            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('move_id')->constrained('moves');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_machines');
    }
};
