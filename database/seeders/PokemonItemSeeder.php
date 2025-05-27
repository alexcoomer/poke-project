<?php

namespace Database\Seeders;

use App\Models\PokemonItem;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class PokemonItemSeeder extends Seeder
{
    private string $csvPath = 'database/data/pokemon_items.csv';

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
                PokemonItem::create([
                    'pokemon_id' => $row[0],
                    'game_id' => $row[1],
                    'item_id' => $row[2],
                    'rarity' => $row[3]
                ]);
            }
        }
    }
}
