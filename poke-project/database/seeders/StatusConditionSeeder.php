<?php

namespace Database\Seeders;

use App\Models\StatusCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusConditionSeeder extends Seeder
{
    private StatusCondition $statusCondition;

    public function __construct(StatusCondition $statusCondition)
    {
        $this->statusCondition = $statusCondition;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: Complete the list of Status Conditions with Volatile Status Conditions
        $statusConditions = [
            [
                'name' => 'Paralysis',
                'abbreviation' => 'PAR'
            ],
            [
                'name' => 'Poison',
                'abbreviation' => 'PSN'
            ],
            [
                'name' => 'Badly Poisoned',
                'abbreviation' => 'TOX'
            ],
            [
                'name' => 'Sleep',
                'abbreviation' => 'SLP'
            ],
            [
                'name' => 'Burn',
                'abbreviation' => 'BRN'
            ],
            [
                'name' => 'Freeze',
                'abbreviation' => 'FRZ'
            ],
            [
                'name' => 'Fainted',
                'abbreviation' => 'KO'
            ]
        ];

        foreach ($statusConditions as $statusCondition)
        {
            $this->statusCondition->create($statusCondition);
        }
    }
}
