<?php

namespace Database\Seeders;

use App\Models\PokemonMoveMethod;
use File;
use Illuminate\Database\Seeder;

class PokemonMoveMethodSeeder extends Seeder
{
    private PokemonMoveMethod $pokemonMoveMethod;
    private string $csvPath = 'database/data/pokemon_move_methods.csv';

    public function __construct(PokemonMoveMethod $pokemonMoveMethod)
    {
        $this->pokemonMoveMethod = $pokemonMoveMethod;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFullPath = base_path($this->csvPath);

        if(File::exists($csvFullPath)) {
            $csvData = array_map('str_getcsv', file($csvFullPath));

            //Skip header row
            array_shift($csvData);

            foreach($csvData as $row) {
                $this->pokemonMoveMethod->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
