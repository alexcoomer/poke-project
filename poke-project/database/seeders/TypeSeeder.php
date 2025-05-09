<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    private Type $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'normal'
            ],
            [
                'name' => 'fighting'
            ],
            [
                'name' => 'flying'
            ],
            [
                'name' => 'poison'
            ],
            [
                'name' => 'ground'
            ],
            [
                'name' => 'rock'
            ],
            [
                'name' => 'bug'
            ],
            [
                'name' => 'Poison'
            ],
            [
                'name' => 'Ground'
            ],
            [
                'name' => 'Flying'
            ],
            [
                'name' => 'Psychic'
            ],
            [
                'name' => 'Bug'
            ],
            [
                'name' => 'Rock'
            ],
            [
                'name' => 'Ghost'
            ],
            [
                'name' => 'Dragon'
            ],
            [
                'name' => 'Dark'
            ],
            [
                'name' => 'Steel'
            ],
            [
                'name' => 'Fairy'
            ],
        ];

        foreach ($types as $type)
        {
            $this->type->create($type);
        }
    }
}
