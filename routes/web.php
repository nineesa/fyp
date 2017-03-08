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

Route::group(['middleware' => ['auth']], function() {
Route::get('/home', 'HomeController@index');
Route::get('/post', 'PostsController@index');
Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');
Route::get('/post/{post}', 'PostsController@show');
Route::get('/post/{post}/edit', 'PostsController@edit');
Route::patch('/post/{post}', 'PostsController@update');
Route::delete('/post/{post}/delete', 'PostsController@destroy');
Route::post('/post/{post}/like', 'LikesController@likesAction');
Route::get('/pendaftaran', 'PendaftaransController@index');
Route::get('/pendaftaran/create', 'PendaftaransController@create');
Route::post('/pendaftaran', 'PendaftaransController@store');
Route::get('/catalog/{pendaftaran}', 'PendaftaransController@show');
Route::get('/pendaftaran/{pendaftaran}/edit', 'PendaftaransController@edit');
Route::patch('/pendaftaran/{pendaftaran}', 'PendaftaransController@update');
Route::get('/catalog', 'PendaftaransController@catalog');



});

Auth::routes();

Route::get('/home', 'HomeController@index');
