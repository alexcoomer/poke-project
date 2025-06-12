<?php

namespace Database\Seeders;

use App\Models\StaticDamageType;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class StaticDamageTypeSeeder extends Seeder
{
    private string $csvPath = 'database/data/static_damage_types.csv';

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
                StaticDamageType::create([
                    'id' => $row[0],
                    'method' => $row[1],
                    'value' => $row[2] === '' ? null : $row[2],
                    'formula' => $row[3] === '' ? null : $row[3]
                ]);
            }
        }
    }
}
