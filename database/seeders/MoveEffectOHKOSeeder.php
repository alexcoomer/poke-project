<?php

namespace Database\Seeders;

use App\Models\MoveEffectOHKO;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveEffectOHKOSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_effect_ohkos.csv';

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
                MoveEffectOHKO::create([
                    'id' => $row[0],
                    'move_effect_id' => $row[1],
                    'target_id' => $row[2]
                ]);
            }
        }
    }
}
