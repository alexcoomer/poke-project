<?php

namespace Database\Seeders;

use App\Models\CritStageEffect;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class CritStageEffectSeeder extends Seeder
{
    private string $csvPath = 'database/data/crit_stage_effects.csv';

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
                CritStageEffect::create([
                    'id' => $row[0],
                    'change_magnetude' => $row[1],
                    'is_temporary' => $row[2]
                ]);
            }
        }
    }
}
