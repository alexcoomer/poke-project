<?php

namespace Database\Seeders;

use App\Models\Nature;
use File;
use Illuminate\Database\Seeder;

class NatureSeeder extends Seeder
{
    private Nature $nature;

    private string $csvPath = 'database/data/natures.csv';

    public function __construct(Nature $nature)
    {
        $this->nature = $nature;
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
                $this->nature->create([
                    'name' => $row[0],
                    'boosted_stat_id' => $row[1],
                    'reduced_stat_id' => $row[2]
                ]);
            }
        }
    }
}
