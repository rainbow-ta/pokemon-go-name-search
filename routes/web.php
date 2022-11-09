<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TODO:トップページに"/"でもアクセス出来るようにする
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource(
        '/name-search',
        // TODO:名前付きルートのより良い記述があればリファクタリングする
        App\Http\Controllers\NameSearchController::class,
        [
            'as' => 'nameSearch',
        ]
    )->except(['show']);
});
