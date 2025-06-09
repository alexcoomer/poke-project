<?php

namespace Database\Seeders;

use App\Models\MoveEffectTrap;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveEffectTrapSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_effect_traps.csv';

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
                MoveEffectTrap::create([
                    'id' => $row[0],
                    'move_effect_id' => $row[1],
                    'trap_type_id' => $row[2],
                    'battle_condition_id' => $row[3] === '' ? null : $row[3]
                ]);
            }
        }
    }
}
