<?php

namespace Database\Seeders;

use App\Models\PokemonEggGroup;
use File;
use Illuminate\Database\Seeder;

class PokemonEggGroupSeeder extends Seeder
{
    private PokemonEggGroup $pokemonEggGroup;
    private string $csvPath = 'database/data/pokemon_egg_groups.csv';

    public function __construct(PokemonEggGroup $pokemonEggGroup)
    {
        $this->pokemonEggGroup = $pokemonEggGroup;
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
                $this->pokemonEggGroup->create([
                    'species_id' => $row[0],
                    'egg_group_id' => $row[1]
                ]);
            }
        }
    }
}
