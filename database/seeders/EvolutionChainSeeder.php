<?php

namespace Database\Seeders;

use App\Models\EvolutionChain;
use File;
use Illuminate\Database\Seeder;

class EvolutionChainSeeder extends Seeder
{
    private EvolutionChain $evolutionChain;
    private string $csvPath = 'database/data/evolution_chains.csv';

    public function __construct(EvolutionChain $evolutionChain)
    {
        $this->evolutionChain = $evolutionChain;
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
                $this->evolutionChain->create([
                    'id' => $row[0],
                    'baby_trigger_item_id' => $row[1]
                ]);
            }
        }
    }
}
