<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use File;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    private string $csvPath = 'database/data/item_categories.csv';

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
                ItemCategory::create([
                    'id' => $row[0],
                    'name' => $row[2],
                    'item_pocket_id' => $row[1]
                ]);
            }
        }
    }
}
