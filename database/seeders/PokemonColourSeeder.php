<?php

namespace Database\Seeders;

use App\Models\PokemonColour;
use File;
use Illuminate\Database\Seeder;

class PokemonColourSeeder extends Seeder
{
    private PokemonColour $pokemonColour;
    private string $csvPath = 'database/data/pokemon_colours.csv';

    public function __construct(PokemonColour $pokemonColour)
    {
        $this->pokemonColour = $pokemonColour;
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
                $this->pokemonColour->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
