<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use File;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    private Pokemon $pokemon;
    private string $csvPath = 'database/data/pokemon.csv';

    public function __construct(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
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
                $this->pokemon->create([
                    'id' => $row[0],
                    'name' => $row[1],
                    'species_id' => $row[2],
                    'height' => $row[3],
                    'weight' => $row[4],
                    'base_experience' => $row[5],
                    'order' => $row[6],
                    'is_default' => $row[7]
                ]);
            }
        }
    }
}
