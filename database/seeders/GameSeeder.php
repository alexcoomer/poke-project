<?php

namespace Database\Seeders;

use App\Models\Game;
use File;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    private string $csvPath = 'database/data/games.csv';

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
                Game::create([
                    'id' => $row[0],
                    'name' => $row[2],
                    'game_group_id' => $row[1]
                ]);
            }
        }
    }
}
