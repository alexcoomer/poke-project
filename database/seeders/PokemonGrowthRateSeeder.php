<?php

namespace Database\Seeders;

use App\Models\PokemonGrowthRate;
use File;
use Illuminate\Database\Seeder;

class PokemonGrowthRateSeeder extends Seeder
{
    private PokemonGrowthRate $pokemonGrowthRate;
    private string $csvPath = 'database/data/pokemon_growth_rates.csv';

    public function __construct(PokemonGrowthRate $pokemonGrowthRate)
    {
        $this->pokemonGrowthRate = $pokemonGrowthRate;
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
                $this->pokemonGrowthRate->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'formula' => $row[2]
                ]);
            }
        }
    }
}
