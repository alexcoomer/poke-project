<?php

namespace Database\Seeders;

use App\Models\PokemonAbility;
use File;
use Illuminate\Database\Seeder;

class PokemonAbilitySeeder extends Seeder
{
    private PokemonAbility $pokemonAbility;
    private string $csvPath = 'database/data/pokemon_abilities.csv';

    public function __construct(PokemonAbility $pokemonAbility)
    {
        $this->pokemonAbility = $pokemonAbility;
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
                $this->pokemonAbility->create([
                    'pokemon_id' => $row[0],
                    'ability_id' => $row[1],
                    'is_hidden' => $row[2],
                    'slot' => $row[3]
                ]);
            }
        }
    }
}
