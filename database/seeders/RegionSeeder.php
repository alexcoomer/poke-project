<?php

namespace Database\Seeders;

use App\Models\Region;
use File;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    private Region $region;
    private string $csvPath = 'database/data/regions.csv';

    public function __construct(Region $region)
    {
        $this->region = $region;
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
                $this->region->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
