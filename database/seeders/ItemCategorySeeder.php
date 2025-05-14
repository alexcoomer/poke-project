<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use File;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    private ItemCategory $itemCategory;
    private string $csvPath = 'database/data/item_categories.csv';

    public function __construct(ItemCategory $itemCategory)
    {
        $this->itemCategory = $itemCategory;
    }

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
                $this->itemCategory->create([
                    'id' => $row[0],
                    'name' => $row[2],
                    'item_pocket_id' => $row[1]
                ]);
            }
        }
    }
}
