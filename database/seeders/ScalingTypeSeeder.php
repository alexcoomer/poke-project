<?php

namespace Database\Seeders;

use App\Models\ScalingType;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class ScalingTypeSeeder extends Seeder
{
    private string $csvPath = 'database/data/scaling_types.csv';

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
                ScalingType::create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
