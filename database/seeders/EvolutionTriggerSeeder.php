<?php

namespace Database\Seeders;

use App\Models\EvolutionTrigger;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class EvolutionTriggerSeeder extends Seeder
{
    private string $csvPath = 'database/data/evolution_triggers.csv';

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
                EvolutionTrigger::create([
                    'id' => $row[0],
                    'name' => $row[1] === '' ? null : $row[1]
                ]);
            }
        }
    }
}
