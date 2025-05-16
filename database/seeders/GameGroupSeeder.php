<?php

namespace Database\Seeders;

use App\Models\GameGroup;
use File;
use Illuminate\Database\Seeder;

class GameGroupSeeder extends Seeder
{
    private GameGroup $gameGroup;
    private string $csvPath = 'database/data/game_groups.csv';

    public function __construct(GameGroup $gameGroup)
    {
        $this->gameGroup = $gameGroup;
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
                $this->gameGroup->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'generation' => $row[2],
                    'order' => $row[3]
                ]);
            }
        }
    }
}
