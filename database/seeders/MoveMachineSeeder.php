<?php

namespace Database\Seeders;

use App\Models\MoveMachine;
use File;
use Illuminate\Database\Seeder;

class MoveMachineSeeder extends Seeder
{
    private MoveMachine $moveMachine;
    private string $csvPath = 'database/data/move_machines.csv';

    public function __construct(MoveMachine $moveMachine)
    {
        $this->moveMachine = $moveMachine;
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
                $this->moveMachine->create([
                    'machine_number' => $row[0],
                    'game_group_id' => $row[1],
                    'item_id' => $row[2],
                    'move_id' => $row[3]
                ]);
            }
        }
    }
}
