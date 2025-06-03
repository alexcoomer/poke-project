<?php

namespace Database\Seeders;

use App\Models\PowerScalingModifier;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class PowerScalingModifierSeeder extends Seeder
{
    private string $csvPath = 'database/data/power_scaling_modifiers.csv';

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
                PowerScalingModifier::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'scaling_type_id' => $row[2],
                    'formula' => $row[3]
                ]);
            }
        }
    }
}
