<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonAbilitySeeder extends Seeder
{
    private Pokemon $pokemon;
    private Ability $ability;

    public function __construct(Pokemon $pokemon, Ability $ability)
    {
        $this->pokemon = $pokemon;
        $this->ability = $ability;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    }
}
