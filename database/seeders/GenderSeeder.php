<?php

namespace Database\Seeders;

use App\Models\Gender;
use File;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    private Gender $gender;
    private string $csvPath = 'database/data/genders.csv';

    public function __construct(Gender $gender)
    {
        $this->gender = $gender;
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
                $this->gender->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
