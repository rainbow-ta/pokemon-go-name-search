<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SearchListSeeder::class);
        $this->call(FilterSeeder::class);
        $this->call(SearchListFilterSeeder::class);
        $this->call(PokemonSeeder::class);
    }
}
