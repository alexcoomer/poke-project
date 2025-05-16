<?php

namespace Database\Seeders;

use App\Models\DamageClass;
use File;
use Illuminate\Database\Seeder;

class DamageClassSeeder extends Seeder
{
    private DamageClass $damageClass;
    private string $csvPath = 'database/data/damage_classes.csv';

    public function __construct(DamageClass $damageClass)
    {
        $this->damageClass = $damageClass;
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
                $this->damageClass->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
