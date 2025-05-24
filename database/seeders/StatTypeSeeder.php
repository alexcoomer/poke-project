<?php

namespace Database\Seeders;

use App\Models\StatType;
use File;
use Illuminate\Database\Seeder;

class StatTypeSeeder extends Seeder
{
    private string $csvPath = 'database/data/stat_types.csv';

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
                StatType::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'abbreviation' => $row[2],
                    'damage_class_id' => $row[3] === '' ? null : $row[3],
                    'is_battle_only' => $row[4],
                    'game_index' => $row[5]
                ]);
            }
        }
    }
}
