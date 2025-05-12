<?php

namespace Database\Seeders;

use App\Models\Move;
use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonMoveSeeder extends Seeder
{
    private Pokemon $pokemon;
    private Move $move;

    public function __construct(Pokemon $pokemon, Move $move)
    {
        $this->pokemon = $pokemon;
        $this->move = $move;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemonMoves = [
            ['pokemon_name' => 'Bulbasaur', 'move_ids' => [1, 2, 3, 4, 5, 6]],
            ['pokemon_name' => 'Ivysaur', 'move_ids' => [1, 2, 3, 4, 5, 6]],
            ['pokemon_name' => 'Venusaur', 'move_ids' => [1, 2, 3, 4, 5, 6]],
        ];
    }
}
