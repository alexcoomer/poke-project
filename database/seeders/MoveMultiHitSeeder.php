<?php

namespace Database\Seeders;

use App\Models\MoveMultiHit;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveMultiHitSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_multihits.csv';

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
                MoveMultiHit::create([
                    'id' => $row[0],
                    'move_id' => $row[1],
                    'number' => $row[2],
                    'chance' => $row[3],
                    'is_accuracy_checked_each_hit' => $row[4],
                    'is_equal_to_number_of_conscious_party_members' => $row[5],
                    'power_addend' => $row[6] === '' ? null : $row[6]
                ]);
            }
        }
    }
}
