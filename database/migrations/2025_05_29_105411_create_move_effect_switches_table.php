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
        Schema::create('move_effect_switches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('move_effect_id')->constrained('move_effects');
            $table->foreignId('switch_type_id')->constrained('switch_types');
            $table->foreignId('target_id')->constrained('targets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_effect_switches');
    }
};
