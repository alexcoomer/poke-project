<?php

namespace Database\Seeders;

use App\Models\StatusCondition;
use File;
use Illuminate\Database\Seeder;

class StatusConditionSeeder extends Seeder
{
    private string $csvPath = 'database/data/status_conditions.csv';

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
                StatusCondition::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'abbreviation' => $row[2]
                ]);
            }
        }
    }
}
