<?php

namespace Database\Seeders;

use App\Models\MoveForcedType;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveForcedTypeSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_forced_types.csv';

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
                MoveForcedType::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'min_turns' => $row[2],
                    'max_turns' => $row[3],
                    'post_effect_status_condition_id' => $row[4] === '' ? null : $row[4],
                    'post_effect_target_id' => $row[5] === '' ? null : $row[5],
                    'prevents_status_condition_id' => $row[6] === '' ? null : $row[6],
                    'prevent_status_condition_target_id' => $row[7] === '' ? null : $row[7]
                ]);
            }
        }
    }
}
