<?php

namespace Database\Seeders;

use App\Models\EggGroup;
use File;
use Illuminate\Database\Seeder;

class EggGroupSeeder extends Seeder
{
    private EggGroup $eggGroup;
    private string $csvPath = 'database/data/egg_groups.csv';

    public function __construct(EggGroup $eggGroup)
    {
        $this->eggGroup = $eggGroup;
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
                $this->eggGroup->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
