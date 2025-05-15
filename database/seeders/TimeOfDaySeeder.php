<?php

namespace Database\Seeders;

use App\Models\TimeOfDay;
use File;
use Illuminate\Database\Seeder;

class TimeOfDaySeeder extends Seeder
{
    private TimeOfDay $timeOfDay;
    private string $csvPath = 'database/data/times_of_day.csv';

    public function __construct(TimeOfDay $timeOfDay)
    {
        $this->timeOfDay = $timeOfDay;
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
                $this->timeOfDay->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'start_time' => $row[2] === '' ? null : $row[2],
                    'end_time' => $row[3] === '' ? null : $row[3]
                ]);
            }
        }
    }
}
