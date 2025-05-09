<?php

namespace Database\Seeders;

use App\Models\StatType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatTypeSeeder extends Seeder
{
    private StatType $statType;

    public function __construct(StatType $statType)
    {
        $this->statType = $statType;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statTypes = [
            [
                'name' => 'Hit Points',
                'abbreviation' => 'HP'
            ],
            [
                'name' => 'Attack',
                'abbreviation' => 'ATK'
            ],
            [
                'name' => 'Defence',
                'abbreviation' => 'DEF'
            ],
            [
                'name' => 'Special Attack',
                'abbreviation' => 'SP ATK'
            ],
            [
                'name' => 'Special Defence',
                'abbreviation' => 'SP DEF'
            ],
            [
                'name' => 'Speed',
                'abbreviation' => 'SPE'
            ],
        ];

        foreach ($statTypes as $statType)
        {
            $this->statType->create($statType);
        }
    }
}
