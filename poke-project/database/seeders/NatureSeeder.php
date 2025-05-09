<?php

namespace Database\Seeders;

use App\Models\Nature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NatureSeeder extends Seeder
{
    private Nature $nature;

    public function __construct(Nature $nature)
    {
        $this->nature = $nature;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $natures = [
            ['name' => 'Hardy', 'boosted_stat_id' => 2, 'reduced_stat_id' => 2], // Neutral
            ['name' => 'Lonely', 'boosted_stat_id' => 2, 'reduced_stat_id' => 3],  // ATK ↑, DEF ↓
            ['name' => 'Adamant', 'boosted_stat_id' => 2, 'reduced_stat_id' => 4], // ATK ↑, SP ATK ↓
            ['name' => 'Naughty', 'boosted_stat_id' => 2, 'reduced_stat_id' => 5], // ATK ↑, SP DEF ↓
            ['name' => 'Brave', 'boosted_stat_id' => 2, 'reduced_stat_id' => 6],   // ATK ↑, SPE ↓

            ['name' => 'Bold', 'boosted_stat_id' => 3, 'reduced_stat_id' => 2],    // DEF ↑, ATK ↓
            ['name' => 'Docile', 'boosted_stat_id' => 3, 'reduced_stat_id' => 3], // Neutral
            ['name' => 'Impish', 'boosted_stat_id' => 3, 'reduced_stat_id' => 4],  // DEF ↑, SP ATK ↓
            ['name' => 'Lax', 'boosted_stat_id' => 3, 'reduced_stat_id' => 5],     // DEF ↑, SP DEF ↓
            ['name' => 'Relaxed', 'boosted_stat_id' => 3, 'reduced_stat_id' => 6], // DEF ↑, SPE ↓

            ['name' => 'Modest', 'boosted_stat_id' => 4, 'reduced_stat_id' => 2],  // SP ATK ↑, ATK ↓
            ['name' => 'Mild', 'boosted_stat_id' => 4, 'reduced_stat_id' => 3],    // SP ATK ↑, DEF ↓
            ['name' => 'Serious', 'boosted_stat_id' => 4, 'reduced_stat_id' => 4], // Neutral
            ['name' => 'Rash', 'boosted_stat_id' => 4, 'reduced_stat_id' => 5],    // SP ATK ↑, SP DEF ↓
            ['name' => 'Quiet', 'boosted_stat_id' => 4, 'reduced_stat_id' => 6],   // SP ATK ↑, SPE ↓

            ['name' => 'Calm', 'boosted_stat_id' => 5, 'reduced_stat_id' => 2],    // SP DEF ↑, ATK ↓
            ['name' => 'Gentle', 'boosted_stat_id' => 5, 'reduced_stat_id' => 3],  // SP DEF ↑, DEF ↓
            ['name' => 'Careful', 'boosted_stat_id' => 5, 'reduced_stat_id' => 4], // SP DEF ↑, SP ATK ↓
            ['name' => 'Bashful', 'boosted_stat_id' => 5, 'reduced_stat_id' => 5], // Neutral
            ['name' => 'Sassy', 'boosted_stat_id' => 5, 'reduced_stat_id' => 6],   // SP DEF ↑, SPE ↓

            ['name' => 'Timid', 'boosted_stat_id' => 6, 'reduced_stat_id' => 2],   // SPE ↑, ATK ↓
            ['name' => 'Hasty', 'boosted_stat_id' => 6, 'reduced_stat_id' => 3],   // SPE ↑, DEF ↓
            ['name' => 'Jolly', 'boosted_stat_id' => 6, 'reduced_stat_id' => 4],   // SPE ↑, SP ATK ↓
            ['name' => 'Naive', 'boosted_stat_id' => 6, 'reduced_stat_id' => 5],   // SPE ↑, SP DEF ↓
            ['name' => 'Quirky', 'boosted_stat_id' => 6, 'reduced_stat_id' => 6], // Neutral
        ];

        foreach($natures as $nature)
        {
            $this->nature->create($nature);
        }
    }
}
