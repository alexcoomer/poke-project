<?php

namespace Database\Seeders;

use App\Models\Generation;
use File;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
    private Generation $generation;
    private string $csvPath = 'database/data/generations.csv';

    public function __construct(Generation $generation)
    {
        $this->generation = $generation;
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
                $this->generation->create([
                    'name' => $row[0],
                    'name_short' => $row[1]
                ]);
            }
        }
    }
}
