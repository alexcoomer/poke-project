<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    private Ability $ability;

    public function __construct(Ability $ability)
    {
        $this->ability = $ability;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: Parse data from CSV
    }
}
