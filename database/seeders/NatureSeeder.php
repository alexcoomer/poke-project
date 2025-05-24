<?php

namespace Database\Seeders;

use App\Models\Nature;
use File;
use Illuminate\Database\Seeder;

class NatureSeeder extends Seeder
{
    private string $csvPath = 'database/data/natures.csv';

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
                Nature::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'decreased_stat_id' => $row[2],
                    'increased_stat_id' => $row[3],
                    'hates_flavour_id' => $row[4],
                    'likes_flavour_id' => $row[5],
                    'game_index' => $row[6]
                ]);
            }
        }
    }
}
