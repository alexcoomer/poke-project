<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(DamageClassSeeder::class);
        $this->call(EggGroupSeeder::class);
        $this->call(EvolutionTriggerSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(GenerationSeeder::class);
        $this->call(ItemFlagSeeder::class);
        $this->call(ItemFlingEffectSeeder::class);
        $this->call(ItemPocketSeeder::class);
        $this->call(PokemonColourSeeder::class);
        $this->call(PokemonGrowthRateSeeder::class);
        $this->call(PokemonHabitatSeeder::class);
        $this->call(PokemonMoveMethodSeeder::class);
        $this->call(PokemonShapeSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(StatTypeSeeder::class);
        $this->call(StatusConditionSeeder::class);
        $this->call(TargetSeeder::class);
        $this->call(TimeOfDaySeeder::class);

        $this->call(AbilitySeeder::class);
        $this->call(GameGroupSeeder::class);
        $this->call(ItemCategorySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(NatureSeeder::class);
        $this->call(TypeSeeder::class);

        $this->call(GameSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(MoveSeeder::class);

        $this->call(EvolutionChainSeeder::class);
        $this->call(ItemFlagMapSeeder::class);

        $this->call(PokemonSpeciesSeeder::class);

        $this->call(PokemonSeeder::class);
        $this->call(PokemonEggGroupSeeder::class);
        $this->call(PokemonEvolutionSeeder::class);

        $this->call(PokemonAbilitySeeder::class);
        $this->call(PokemonFormSeeder::class);
        $this->call(PokemonItemSeeder::class);
        $this->call(PokemonMoveSeeder::class);
        $this->call(PokemonStatSeeder::class);
        $this->call(PokemonTypeSeeder::class);

        $this->call(PokemonFormTypeSeeder::class);
    }
}
