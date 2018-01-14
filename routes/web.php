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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', 'GameController@index');

Route::get('surah/{no_surat}', 'GameController@get_the_surah');

Route::get('question/surat/{no_surat}', 'GameController@get_the_question');