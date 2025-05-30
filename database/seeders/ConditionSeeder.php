<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    private string $csvPath = 'database/data/conditions.csv';

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
                Condition::create([
                    'id' => $row[0],
                    'description' => $row[1]
                ]);
            }
        }
    }
}
