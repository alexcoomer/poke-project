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
        Schema::create('pokemon_form_types', function (Blueprint $table) {
            $table->foreignId('pokemon_form_id')->constrained('pokemon_forms');
            $table->foreignId('type_id')->constrained('types');
            $table->smallInteger('slot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_form_types');
    }
};
