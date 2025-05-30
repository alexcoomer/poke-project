<?php

namespace Database\Seeders;

use App\Models\RecoilType;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class RecoilTypeSeeder extends Seeder
{
    private string $csvPath = 'database/data/recoil_types.csv';

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
                RecoilType::create([
                    'id' => $row[0],
                    'is_fixed' => $row[1],
                    'percentage' => $row[2]
                ]);
            }
        }
    }
}
