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
        Schema::create('moves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('generation_introduced');
            $table->foreignId('type_id')->constrained('types');
            $table->smallInteger('power')->nullable();
            $table->smallInteger('power_points');
            $table->smallInteger('accuracy')->nullable();
            $table->smallInteger('priority');
            $table->foreignId('target_id')->constrained('targets');
            $table->foreignId('move_type_id')->constrained('move_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moves');
    }
};
