<?php

namespace Database\Seeders;

use App\Models\PokemonShape;
use File;
use Illuminate\Database\Seeder;

class PokemonShapeSeeder extends Seeder
{
    private PokemonShape $pokemonShape;
    private string $csvPath = 'database/data/pokemon_shapes.csv';
    public function __construct(PokemonShape $pokemonShape)
    {
        $this->pokemonShape = $pokemonShape;
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
                $this->pokemonShape->create([
                    'id' => $row[0],
                    'name' => $row[1]
                ]);
            }
        }
    }
}
