<?php

namespace Database\Seeders;

use App\Models\PokemonSpecies;
use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PokemonSpeciesSeeder extends Seeder
{
    private PokemonSpecies $pokemonSpecies;
    private string $csvPath = 'database/data/pokemon_species.csv';

    public function __construct(PokemonSpecies $pokemonSpecies)
    {
        $this->pokemonSpecies = $pokemonSpecies;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFullPath = base_path($this->csvPath);

        if (File::exists($csvFullPath)) {
            $csvData = array_map('str_getcsv', file($csvFullPath));

            //Skip header row
            array_shift($csvData);

            Schema::disableForeignKeyConstraints();

            foreach ($csvData as $row) {
                $this->pokemonSpecies->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'generation_id' => $row[2],
                    'evolves_from_species_id' => $row[3] === '' ? null : $row[3],
                    'evolution_chain_id' => $row[4],
                    'colour_id' => $row[5],
                    'shape_id' => $row[6],
                    'habitat_id' => $row[7],
                    'gender_rate' => $row[8],
                    'capture_rate' => $row[9],
                    'base_happiness' => $row[10],
                    'is_baby' => $row[11] === '1',
                    'hatch_counter' => $row[12],
                    'has_gender_differences' => $row[13] === '1',
                    'growth_rate_id' => $row[14],
                    'forms_switchable' => $row[15] === '1',
                    'is_legendary' => $row[16] === '1',
                    'is_mythical' => $row[17] === '1',
                ]);
            }

            Schema::enableForeignKeyConstraints();
        }
    }
}
