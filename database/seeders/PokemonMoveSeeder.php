<?php

namespace Database\Seeders;


use App\Models\PokemonMove;
use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonMoveSeeder extends Seeder
{
    private PokemonMove $pokemonMove;
    private string $csvPath = 'database/data/pokemon_moves.csv';

    public function __construct(PokemonMove $pokemonMove)
    {
        $this->pokemonMove = $pokemonMove;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFullPath = base_path($this->csvPath);

        if (File::exists($csvFullPath)) {
            $inputFile = fopen($csvFullPath, 'r');

            if (!$inputFile) {
                die("Error opening file.");
            }

            // Skip header row
            fgetcsv($inputFile);

            $batchData = [];
            $index = 1;

            while (($row = fgetcsv($inputFile)) !== false) {

                $batchData[] = [
                    'id' => $index,
                    'pokemon_id' => $row[0],
                    'game_group_id' => $row[1],
                    'move_id' => $row[2],
                    'pokemon_move_method_id' => $row[3],
                    'level' => $row[4] === '' ? null : $row[4],
                    'order' => $row[5] === '' ? null : $row[5],
                    'mastery' => $row[6] === '' ? null : $row[6]
                ];

                $index++;

                if (count($batchData) >= 500) { // Inserts in chunks of 500 records
                    PokemonMove::insert($batchData);
                    $batchData = []; // Reset array
                }
            }

            // Insert remaining records
            if (!empty($batchData)) {
                PokemonMove::insert($batchData);
            }


            fclose($inputFile);
        }
    }
}
