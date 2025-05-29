<?php

namespace Database\Seeders;

use App\Models\MoveChargeEffect;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveChargeEffectSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_charge_effects.csv';

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
                MoveChargeEffect::create([
                    'id' => $row[0],
                    'move_id' => $row[1]
                ]);
            }
        }
    }
}
