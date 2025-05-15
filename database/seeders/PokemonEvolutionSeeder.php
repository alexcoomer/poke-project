<?php

namespace Database\Seeders;

use App\Models\PokemonEvolution;
use File;
use Illuminate\Database\Seeder;

class PokemonEvolutionSeeder extends Seeder
{
    private PokemonEvolution $pokemonEvolution;
    private string $csvPath = 'database/data/pokemon_evolutions.csv';

    public function __construct(PokemonEvolution $pokemonEvolution)
    {
        $this->pokemonEvolution = $pokemonEvolution;
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
                $this->pokemonEvolution->create([
                    'id' => $row[0],
                    'evolved_species_id' => $row[1],
                    'evolution_trigger_id' => $row[2],
                    'trigger_item_id' => $row[3] === '' ? null : $row[3],
                    'minimum_level' => $row[4] === '' ? null : $row[4],
                    'gender_id' => $row[5] === '' ? null : $row[5],
                    'location_id' => $row[6] === '' ? null : $row[6],
                    'held_item_id' => $row[7] === '' ? null : $row[7],
                    'time_of_day_id' => $row[8] === '' ? null : $row[8],
                    'known_move_id' => $row[9] === '' ? null : $row[9],
                    'known_move_type_id' => $row[10] === '' ? null : $row[10],
                    'minimum_happiness' => $row[11] === '' ? null : $row[11],
                    'minimum_beauty' => $row[12] === '' ? null : $row[12],
                    'minimum_affection' => $row[13] === '' ? null : $row[13],
                    'relative_physical_stats' => $row[14] === '' ? null : $row[14],
                    'party_species_id' => $row[15] === '' ? null : $row[15],
                    'party_type_id' => $row[16] === '' ? null : $row[16],
                    'trade_species_id' => $row[17] === '' ? null : $row[17],
                    'needs_overworld_rain' => $row[18],
                    'turn_upside_down' => $row[19]
                ]);
            }
        }
    }
}
