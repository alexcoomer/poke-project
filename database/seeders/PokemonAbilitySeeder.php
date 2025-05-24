<?php

namespace Database\Seeders;

use App\Models\PokemonAbility;
use File;
use Illuminate\Database\Seeder;

class PokemonAbilitySeeder extends Seeder
{
    private string $csvPath = 'database/data/pokemon_abilities.csv';

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
                PokemonAbility::create([
                    'pokemon_id' => $row[0],
                    'ability_id' => $row[1],
                    'is_hidden' => $row[2],
                    'slot' => $row[3]
                ]);
            }
        }
    }
}
