<?php

namespace Database\Seeders;

use App\Models\Move;
use Illuminate\Database\Seeder;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class MoveSeeder extends Seeder
{
    private Move $move;

    public function __construct(Move $move)
    {
        $this->move = $move;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: Parse data from CSV
    }
}
