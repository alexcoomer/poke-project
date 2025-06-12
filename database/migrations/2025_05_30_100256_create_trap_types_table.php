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
        Schema::create('trap_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('min_turns')->nullable();
            $table->smallInteger('max_turns')->nullable();
            $table->foreignId('static_damage_type_id')->nullable()->constrained('static_damage_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trap_types');
    }
};
