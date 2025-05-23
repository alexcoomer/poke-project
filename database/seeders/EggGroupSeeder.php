<?php

namespace Database\Seeders;

use App\Models\EggGroup;
use File;
use Illuminate\Database\Seeder;

class EggGroupSeeder extends Seeder
{
    private string $csvPath = 'database/data/egg_groups.csv';

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
                EggGroup::create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
