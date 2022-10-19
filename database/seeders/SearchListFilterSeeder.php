<?php

namespace Database\Seeders;

use App\Models\SearchListFilter;
use Illuminate\Database\Seeder;

class SearchListFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SearchListFilter::create([
            'is_exclusion' => 1,
            'is_or_search' => 0,
            'memo' => '厳選済み',
            'search_list_id' => '1',
            'filter_id' => '1',
        ]);
        SearchListFilter::create([
            'is_exclusion' => 0,
            'is_or_search' => 1,
            'memo' => '',
            'search_list_id' => '2',
            'filter_id' => '2',
        ]);
        SearchListFilter::create([
            'is_exclusion' => 0,
            'is_or_search' => 0,
            'memo' => '100がほしい',
            'search_list_id' => '2',
            'filter_id' => '1',
        ]);
    }
}
