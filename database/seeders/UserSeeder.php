<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'オーキド・ユキナリ',
                'email' => 'okido@domain.sample',
                'email_verified_at' => now(),
                'password' => \Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
        ]);
        User::factory()->count(10)->create();
    }
}
