<?php

namespace Database\Seeders;

use App\Models\MoveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoveTypeSeeder extends Seeder
{
    private MoveType $moveType;

    public function __construct(MoveType $moveType)
    {
        $this->moveType = $moveType;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: Parse data from CSV
    }
}
