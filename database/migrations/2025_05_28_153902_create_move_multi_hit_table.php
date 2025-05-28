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
        Schema::create('move_multi_hit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('move_id')->constrained('moves');
            $table->smallInteger('number')->nullable();
            $table->smallInteger('chance');
            $table->boolean('is_accuracy_checked_each_hit');
            $table->boolean('is_equal_to_number_of_conscious_party_members');
            $table->smallInteger('power_addend')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_multi_hit');
    }
};
