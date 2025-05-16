<?php

namespace Database\Seeders;

use App\Models\PokemonType;
use File;
use Illuminate\Database\Seeder;

class PokemonTypeSeeder extends Seeder
{
    private PokemonType $pokemonType;
    private string $csvPath = 'database/data/pokemon_types.csv';

    public function __construct(PokemonType $pokemonType)
    {
        $this->pokemonType = $pokemonType;
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
                $this->pokemonType->create([
                    'pokemon_id' => $row[0],
                    'type_id' => $row[1],
                    'slot' => $row[2]
                ]);
            }
        }
    }
}
