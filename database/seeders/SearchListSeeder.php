<?php

namespace Database\Seeders;

use App\Models\SearchList;
use Illuminate\Database\Seeder;

class SearchListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SearchList::create([
            'name' => '個体値100',
            'user_id' => 1,
        ]);
        SearchList::create([
            'name' => 'お気に入り',
            'user_id' => 1,
        ]);
        SearchList::create([
            'name' => '個体値100とお気に入り',
            'user_id' => 1,
        ]);
    }
}
