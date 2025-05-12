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
        $pokemonAbilities = [
            ['pokemon_name' => 'Bulbasaur', 'ability_name' => 'Overgrow', 'hidden' => false],
            ['pokemon_name' => 'Bulbasaur', 'ability_name' => 'Chlorophyll', 'hidden' => true],
            ['pokemon_name' => 'Ivysaur', 'ability_name' => 'Overgrow', 'hidden' => false],
            ['pokemon_name' => 'Ivysaur', 'ability_name' => 'Chlorophyll', 'hidden' => true],
            ['pokemon_name' => 'Venusaur', 'ability_name' => 'Overgrow', 'hidden' => false],
            ['pokemon_name' => 'Venusaur', 'ability_name' => 'Chlorophyll', 'hidden' => true],
        ];

        foreach ($pokemonAbilities as $entry) {
            $pokemon = $this->pokemon->where('name', $entry['pokemon_name'])->first();
            $ability = $this->ability->where('name', $entry['ability_name'])->first();

            if ($pokemon && $ability) {
                $pokemon->abilities()->attach($ability->id, ['hidden' => $entry['hidden']]);
            }
        }
    }
}
