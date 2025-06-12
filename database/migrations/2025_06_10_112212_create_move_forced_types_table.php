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
        Schema::create('move_forced_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('min_turns');
            $table->smallInteger('max_turns');
            $table->foreignId('post_effect_status_condition_id')->nullable()->constrained('status_conditions');
            $table->foreignId('post_effect_target_id')->nullable()->constrained('targets');
            $table->foreignId('prevents_status_condition_id')->nullable()->constrained('status_conditions');
            $table->foreignId('prevent_status_condition_target_id')->nullable()->constrained('targets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_forced_types');
    }
};
