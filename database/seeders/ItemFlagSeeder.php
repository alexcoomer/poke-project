<?php

namespace Database\Seeders;

use App\Models\ItemFlag;
use File;
use Illuminate\Database\Seeder;

class ItemFlagSeeder extends Seeder
{
    private ItemFlag $itemFlag;
    private string $csvPath = 'database/data/item_flags.csv';

    public function __construct(ItemFlag $itemFlag)
    {
        $this->itemFlag = $itemFlag;
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
                $this->itemFlag->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
