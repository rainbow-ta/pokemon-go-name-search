<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filter::insert([
            [
                'name' => 'お気に入り',
                'query' => 'お気に入り',
                'description' => 'お気に入り',
            ],
            [
                'name' => '色違い',
                'query' => '色違い',
                'description' => '色違い',
            ],
            [
                'name' => 'キラポケモン',
                'query' => 'キラ',
                'description' => 'キラポケモン',
            ],
            [
                'name' => 'でんせつ',
                'query' => '伝説のポケモン',
                'description' => '伝説のポケモン',
            ],
            [
                'name' => 'シャドウ',
                'query' => 'しゃどう',
                'description' => 'シャドウポケモン',
            ],
            [
                'name' => '4*',
                'query' => '4*',
                'description' => '個体値100%',
            ],
            [
                'name' => 'GBL',
                'query' => '0-1こうげき&3-4ぼうぎょ&3-4hp',
                'description' => '個体値：攻撃0-5,防御11-15,HP11-15',
            ],
        ]);
    }
}
