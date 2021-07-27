<?php

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

Route::get('/', function() {
    return redirect('/news');
});

Route::group(['prefix' => 'news'], function() {

    $transliterationRegex = '[a-z0-9._-]+';

    Route::get('/', 'IndexController@index');
    Route::get('/{category}', 'IndexController@showCategory')->where('category', $transliterationRegex);
    Route::get('/{category}/{news}', 'IndexController@showNews')->where([
        'category' => $transliterationRegex,
        'news' => $transliterationRegex,
    ]);
});
