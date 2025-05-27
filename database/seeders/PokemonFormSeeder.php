<?php

namespace Database\Seeders;

use App\Models\PokemonForm;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class PokemonFormSeeder extends Seeder
{
    private string $csvPath = 'database/data/pokemon_forms.csv';

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
                PokemonForm::create([
                    'id' => $row[0],
                    'pokemon_form_name' => $row[1],
                    'form_name' => $row[2] === '' ? null : $row[2],
                    'pokemon_id' => $row[3],
                    'introduced_in_game_id' => $row[4],
                    'is_default' => $row[5],
                    'is_battle_only' => $row[6],
                    'is_mega' => $row[7],
                    'form_order' => $row[8],
                    'order' => $row[9]
                ]);
            }
        }
    }
}
