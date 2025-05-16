<?php

namespace Database\Seeders;

use App\Models\Move;
use Illuminate\Database\Seeder;
use File;

class MoveSeeder extends Seeder
{
    private Move $move;
    private string $csvPath = 'database/data/moves.csv';

    public function __construct(Move $move)
    {
        $this->move = $move;
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
                $this->move->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'generation_id' => $row[2],
                    'type_id' => $row[3],
                    'power' => $row[4] === '' ? null : $row[4],
                    'power_points' => $row[5],
                    'accuracy' => $row[6] === '' ? null : $row[6],
                    'priority' => $row[7],
                    'target_id' => $row[8],
                    'damage_class_id' => $row[9]
                ]);
            }
        }
    }
}
