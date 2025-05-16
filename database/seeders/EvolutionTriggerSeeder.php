<?php

namespace Database\Seeders;

use App\Models\EvolutionTrigger;
use File;
use Illuminate\Database\Seeder;

class EvolutionTriggerSeeder extends Seeder
{
    private EvolutionTrigger $evolutionTrigger;
    private string $csvPath = 'database/data/evolution_triggers.csv';

    public function __construct(EvolutionTrigger $evolutionTrigger)
    {
        $this->evolutionTrigger = $evolutionTrigger;
    }

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
                $this->evolutionTrigger->create([
                    'id' => $row[0],
                    'name' => $row[1] === '' ? null : $row[1]
                ]);
            }
        }
    }
}
