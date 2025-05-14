<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    private Pokemon $pokemon;

    public function __construct(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TODO: Add CSV data and seed database
    }
}
