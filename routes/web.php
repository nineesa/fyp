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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/catalog', 'PendaftaransController@catalog');
Route::get('/catalog/{pendaftaran}', 'PendaftaransController@show');
Route::get('/calendar', 'PendaftaransController@calendar');

Auth::routes();


Route::group(['middleware' =>  ['auth', 'pengguna']], function() {
  Route::post('/tempahan', 'TempahansController@store' );
  Route::get('/tempahan', 'TempahansController@index');
  Route::get('/tempahan/{tempahan}', 'TempahansController@show');

});


Route::group(['middleware' =>  ['auth', 'pentadbir']], function() {
  Route::get('/listLatihan', 'PendaftaransController@listLatihan');
  Route::get('/sahLatihan/{pendaftaran}/sahLatihan', 'PendaftaransController@sahLatihan');
  Route::patch('/sahLatihan/{pendaftaran}', 'PendaftaransController@simpan');
});

Route::group(['middleware' =>  ['auth', 'penganjur']], function() {
  Route::get('/pendaftaran', 'PendaftaransController@index');
  Route::get('/pendaftaran/create', 'PendaftaransController@create');
  Route::post('/pendaftaran', 'PendaftaransController@store');
  Route::get('/pendaftaran/{pendaftaran}/edit', 'PendaftaransController@edit');
  Route::patch('/pendaftaran/{pendaftaran}', 'PendaftaransController@update');
});
