<?php

namespace Database\Seeders;

use App\Models\PowerStaticModifier;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class PowerStaticModifierSeeder extends Seeder
{
    private string $csvPath = 'database/data/power_static_modifiers.csv';

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
                PowerStaticModifier::create([
                    'id' => $row[0],
                    'multiplier' => $row[1],
                    'addend' => $row[2],
                    'is_cumulative' => $row[3]
                ]);
            }
        }
    }
}
