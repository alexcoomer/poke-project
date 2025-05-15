<?php

namespace Database\Seeders;

use App\Models\PokemonFormType;
use File;
use Illuminate\Database\Seeder;

class PokemonFormTypeSeeder extends Seeder
{
    private PokemonFormType $pokemonFormType;
    private string $csvPath = 'database/data/pokemon_form_types.csv';

    public function __construct(PokemonFormType $pokemonFormType)
    {
        $this->pokemonFormType = $pokemonFormType;
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
                $this->pokemonFormType->create([
                    'pokemon_form_id' => $row[0],
                    'type_id' => $row[1],
                    'slot' => $row[2]
                ]);
            }
        }
    }
}
