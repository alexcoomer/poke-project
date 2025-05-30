<?php

namespace Database\Seeders;

use App\Models\TrapType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TrapTypeSeeder extends Seeder
{
    private string $csvPath = 'database/data/trap_types.csv';

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
                TrapType::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'min_turns' => $row[2] === '' ? null : $row[2],
                    'max_turns' => $row[3] === '' ? null : $row[3],
                    'percentage_damage_per_turn' => $row[4] === '' ? null : $row[4]
                ]);
            }
        }
    }
}
