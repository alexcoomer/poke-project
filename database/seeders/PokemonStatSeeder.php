<?php

namespace Database\Seeders;

use App\Models\PokemonStat;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class PokemonStatSeeder extends Seeder
{
    private string $csvPath = 'database/data/pokemon_stats.csv';

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
                PokemonStat::create([
                    'pokemon_id' => $row[0],
                    'stat_type_id' => $row[1],
                    'base_stat' => $row[2],
                    'effort' => $row[3],
                ]);
            }
        }
    }
}
