<?php

namespace Database\Seeders;

use App\Models\Item;
use File;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    private Item $item;
    private string $csvPath = 'database/data/items.csv';

    public function __construct(Item $item)
    {
        $this->item = $item;
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
                $this->item->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'item_category_id' => $row[2],
                    'cost' => $row[3] === '0' ? null : $row[3],
                    'item_fling_power' => $row[4] === '' ? null : $row[4],
                    'item_fling_effect_id' => $row[5] === '' ? null : $row[5]
                ]);
            }
        }
    }
}
