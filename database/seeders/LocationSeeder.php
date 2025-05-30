<?php

namespace Database\Seeders;

use App\Models\Location;
use File;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    private Location $location;
    private string $csvPath = 'database/data/locations.csv';

    public function __construct(Location $location)
    {
        $this->location = $location;
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
                $this->location->create([
                    'id' => $row[0],
                    'region_id' => $row[1] === '' ? null : $row[1],
                    'name' => $row[2]
                ]);
            }
        }
    }
}
