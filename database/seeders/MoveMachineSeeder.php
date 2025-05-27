<?php

namespace Database\Seeders;

use App\Models\MoveMachine;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class MoveMachineSeeder extends Seeder
{
    private string $csvPath = 'database/data/move_machines.csv';

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
                MoveMachine::create([
                    'machine_number' => $row[0],
                    'game_group_id' => $row[1],
                    'item_id' => $row[2],
                    'move_id' => $row[3]
                ]);
            }
        }
    }
}
