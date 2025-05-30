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
        Schema::create('move_charge_effect_stat_effects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('move_charge_effect_id')->constrained('move_charge_effects');
            $table->foreignId('stat_effect_id')->constrained('stat_effects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_charge_effect_stat_effects');
    }
};
