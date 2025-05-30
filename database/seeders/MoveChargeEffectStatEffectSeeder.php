<?php

namespace Database\Seeders;

use App\Models\MoveChargeEffectStatEffect;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveChargeEffectStatEffectSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_charge_effect_stat_effects.csv';

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
                MoveChargeEffectStatEffect::create([
                    'id' => $row[0],
                    'move_charge_effect_id' => $row[1],
                    'stat_effect_id' => $row[2]
                ]);
            }
        }
    }
}
