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
        Schema::create('static_damage_types', function (Blueprint $table) {
            $table->id();
            $table->enum('method', ['fixed_hp', 'percentage_hp', 'formula']);
            $table->smallInteger('value')->nullable();
            $table->json('formula')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_damage_types');
    }
};
