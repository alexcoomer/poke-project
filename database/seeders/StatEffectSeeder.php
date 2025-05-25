<?php

namespace Database\Seeders;

use App\Models\StatEffect;
use File;
use Illuminate\Database\Seeder;

class StatEffectSeeder extends Seeder
{
    private string $csvPath = 'database/data/stat_effects.csv';

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
                StatEffect::create([
                    'id' => $row[0],
                    'stat_type_id' => $row[1],
                    'change_magnitude' => $row[2]
                ]);
            }
        }
    }
}
