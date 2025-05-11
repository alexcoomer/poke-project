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

        $this->call(MoveTypeSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(StatTypeSeeder::class);
        $this->call(StatusConditionSeeder::class);
        $this->call(TargetSeeder::class);

        $this->call(NatureSeeder::class);

        $this->call(MoveSeeder::class);
        $this->call(AbilitySeeder::class);
        $this->call(PokemonSeeder::class);

        $this->call(PokemonAbilitySeeder::class);
    }
}
