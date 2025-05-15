<?php

namespace Database\Seeders;

use App\Models\Ability;
use File;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    private Ability $ability;
    private string $csvPath = 'database/data/abilities.csv';

    public function __construct(Ability $ability)
    {
        $this->ability = $ability;
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
                $this->ability->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'generation_id' => $row[2],
                    'is_main_series' => $row[3]
                ]);
            }
        }
    }
}
