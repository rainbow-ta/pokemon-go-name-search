<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use File;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/pokedex.json');
        $pokemons = json_decode($json);

        foreach ($pokemons as $key => $value) {
            Pokemon::insert([
                'pokedex_no' => $value->id,
                'name' => $value->name->japanese,
            ]);
        }
    }
}
