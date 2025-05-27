<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    private string $csvPath = 'database/data/experience.csv';

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
                Experience::create([
                    'growth_rate_id' => $row[0],
                    'level' => $row[1],
                    'experience' => $row[2]
                ]);
            }
        }
    }
}
