<?php

namespace Database\Seeders;

use App\Models\MoveEffectForcedMove;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveEffectForcedMoveSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_effect_forced_moves.csv';

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
                MoveEffectForcedMove::create([
                    'id' => $row[0],
                    'move_effect_id' => $row[1],
                    'move_force_typed_id' => $row[2],
                    'target_id' => $row[3],
                    'battle_condition_id' => $row[4] === '' ? null : $row[4]
                ]);
            }
        }
    }
}
