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
        $pokemon = [
            [
                'pokedex_number' => 1,
                'name' => 'Bulbasaur',
                'image_path' => null,
                'pre_evolution_id' => null,
                'base_hit_points' => 45,
                'base_attack' => 49,
                'base_defence' => 49,
                'base_special_attack' => 65,
                'base_special_defence' => 65,
                'base_speed' => 45
            ],
            [
                'pokedex_number' => 2,
                'name' => 'Ivysaur',
                'image_path' => null,
                'pre_evolution_id' => 1,
                'base_hit_points' => 60,
                'base_attack' => 62,
                'base_defence' => 63,
                'base_special_attack' => 80,
                'base_special_defence' => 80,
                'base_speed' => 60
            ],
            [
                'pokedex_number' => 3,
                'name' => 'Venusaur',
                'image_path' => null,
                'pre_evolution_id' => 2,
                'base_hit_points' => 80,
                'base_attack' => 82,
                'base_defence' => 83,
                'base_special_attack' => 100,
                'base_special_defence' => 100,
                'base_speed' => 80
            ],
        ];

        foreach ($pokemon as $monster)
        {
            $this->pokemon->create($monster);
        }
    }
}
