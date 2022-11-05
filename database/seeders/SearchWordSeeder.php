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
            'search_word' => '日数0,日数1,日数2,日数3,日数4,日数5,日数6,日数7&!デスマス&!お気に入り&!伝説のポケモン&!こうかん&!ロコン&!コマタナ&!ボクレー&!ヤミラミ&!ゴビット&!アシマリ&!ミカルゲ&!マッギョ&!プロトーガ&!ミルタンク&!ヨーギラス&!ヌケニン&!ゾロア&!メグロコ',
            'memo' => '個体値100',
        ]);
        SearchWord::create([
            'name' => 'お気に入り',
            'user_id' => 1,
            'search_word' => '日数0,日数1,日数2,日数3,日数4,日数5,日数6,日数7&!デスマス&!お気に入り&!伝説のポケモン&!こうかん&!ロコン&!コマタナ&!ボクレー&!ヤミラミ&!ゴビット&!アシマリ&!ミカルゲ&!マッギョ&!プロトーガ&!ミルタンク&!ヨーギラス&!ヌケニン&!ゾロア&!メグロコ',
            'memo' => 'お気に入り',
        ]);
        SearchWord::create([
            'name' => '個体値100とお気に入り',
            'user_id' => 1,
            'search_word' => '日数0,日数1,日数2,日数3,日数4,日数5,日数6,日数7&!デスマス&!お気に入り&!伝説のポケモン&!こうかん&!ロコン&!コマタナ&!ボクレー&!ヤミラミ&!ゴビット&!アシマリ&!ミカルゲ&!マッギョ&!プロトーガ&!ミルタンク&!ヨーギラス&!ヌケニン&!ゾロア&!メグロコ',
            'memo' => '個体値100とお気に入り',
        ]);
    }
}
