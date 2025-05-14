<?php

namespace Database\Seeders;

use App\Models\Type;
use File;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    private Type $type;
    private string $csvPath = 'database/data/types.csv';

    public function __construct(Type $type)
    {
        $this->type = $type;
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
                $this->type->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'generation_id' => $row[2],
                    'damage_class_id' => $row[3] === '' ? null : $row[3]
                ]);
            }
        }
    }
}
