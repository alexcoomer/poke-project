<?php

namespace Database\Seeders;

use App\Models\MoveType;
use File;
use Illuminate\Database\Seeder;

class MoveTypeSeeder extends Seeder
{
    private MoveType $moveType;
    private string $csvPath = 'database/data/move_types.csv';

    public function __construct(MoveType $moveType)
    {
        $this->moveType = $moveType;
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
                $this->moveType->create([
                    'name' => $row[1],
                ]);
            }
        }
    }
}
