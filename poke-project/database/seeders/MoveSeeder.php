<?php

namespace Database\Seeders;

use App\Models\Move;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\Log;

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
                Log::warning($row);

                $this->move->create([
                    'name' => $row[0],
                    'generation_introduced' => $row[1],
                    'type_id' => $row[2],
                    'power' => $row[3] === '' ? null : $row[3],
                    'power_points' => $row[4],
                    'accuracy' => $row[5] === '' ? null : $row[5],
                    'priority' => $row[6],
                    'target_id' => $row[7],
                    'move_type_id' => $row[8]
                ]);
            }
        }
    }
}
