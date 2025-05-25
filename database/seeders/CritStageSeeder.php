<?php

namespace Database\Seeders;

use App\Models\CritStage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class CritStageSeeder extends Seeder
{
    private string $csvPath = 'database/data/crit_stages.csv';

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
                CritStage::create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'probability' => $row[2]
                ]);
            }
        }
    }
}
