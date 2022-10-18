<?php

namespace Database\Seeders;

use App\Models\SearchWord;
use Illuminate\Database\Seeder;

class SearchWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SearchWord::create([
            'name' => '個体値100',
            'user_id' => 1,
        ]);
        SearchWord::create([
            'name' => 'お気に入り',
            'user_id' => 1,
        ]);
        SearchWord::create([
            'name' => '個体値100とお気に入り',
            'user_id' => 1,
        ]);
    }
}
