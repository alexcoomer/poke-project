<?php

namespace Database\Seeders;

use App\Models\FieldEffect;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class FieldEffectSeeder extends Seeder
{
    private string $csvPath = 'database/data/field_effects.csv';

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
                FieldEffect::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'duration' => $row[2] === '' ? null : $row[2]
                ]);
            }
        }
    }
}
