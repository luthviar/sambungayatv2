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

Route::get('/result', 'GameController@result');

Route::post('/next/{no_surat}', 'GameController@next_question');

Route::post('/selected-surat','GameController@selected_surat');

Route::post('/finish-all/{id_attempt}', 'GameController@finish_all');

Route::get('/pilih-surat', 'GameController@pilih_surat');

Route::get('surah/{no_surat}', 'GameController@get_the_surah');

Route::get('question/surat/{no_surat}', 'GameController@get_the_question');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
