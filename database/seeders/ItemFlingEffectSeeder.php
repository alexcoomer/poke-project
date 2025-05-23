<?php

namespace Database\Seeders;

use App\Models\ItemFlingEffect;
use File;
use Illuminate\Database\Seeder;

class ItemFlingEffectSeeder extends Seeder
{
    private string $csvPath = 'database/data/item_fling_effects.csv';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFullPath = base_path($this->csvPath);

        if (File::exists($csvFullPath)) {
            $csvData = array_map('str_getcsv', file($csvFullPath));

            //Skip header row
            array_shift($csvData);

            foreach ($csvData as $row) {
                ItemFlingEffect::create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
