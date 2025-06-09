<?php

namespace Database\Seeders;

use App\Models\MoveEffectPowerStaticModifier;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveEffectPowerStaticModifierSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_effect_power_static_modifiers.csv';

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
                MoveEffectPowerStaticModifier::create([
                    'id' => $row[0],
                    'move_effect_id' => $row[1],
                    'power_static_modifier_id' => $row[2],
                    'target_id' => $row[3],
                    'chance' => $row[4],
                    'battle_condition_id' => $row[5] === '' ? null : $row[5]
                ]);
            }
        }
    }
}
