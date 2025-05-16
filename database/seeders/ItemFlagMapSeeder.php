<?php

namespace Database\Seeders;

use App\Models\ItemFlagMap;
use File;
use Illuminate\Database\Seeder;

class ItemFlagMapSeeder extends Seeder
{
    private ItemFlagMap $itemFlagMap;
    private string $csvPath = 'database/data/item_flag_map.csv';

    public function __construct(ItemFlagMap $itemFlagMap)
    {
        $this->itemFlagMap = $itemFlagMap;
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
                $this->itemFlagMap->create([
                    'item_id' => $row[0],
                    'item_flag_id' => $row[1]
                ]);
            }
        }
    }
}
