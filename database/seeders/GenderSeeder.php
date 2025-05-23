<?php

namespace Database\Seeders;

use App\Models\Gender;
use File;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    private string $csvPath = 'database/data/genders.csv';

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
                Gender::create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
