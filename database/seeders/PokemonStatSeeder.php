<?php

namespace Database\Seeders;

use App\Models\PokemonStat;
use File;
use Illuminate\Database\Seeder;

class PokemonStatSeeder extends Seeder
{
    private PokemonStat $pokemonStat;
    private string $csvPath = 'database/data/pokemon_stats.csv';

    public function __construct(PokemonStat $pokemonStat)
    {
        $this->pokemonStat = $pokemonStat;
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
                $this->pokemonStat->create([
                    'pokemon_id' => $row[0],
                    'stat_type_id' => $row[1],
                    'base_stat' => $row[2],
                    'effort' => $row[3],
                ]);
            }
        }
    }
}
