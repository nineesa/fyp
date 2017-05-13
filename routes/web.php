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
// Route::get('/calendar', 'PendaftaransController@calendar');
// Route::resource('pendaftarans', 'PendaftaransController',['only' => ['calendar']]);
Route::get('/calendar', 'PendaftaransController@calendar');
Route::get('/api', function() {
    $pendaftarans = DB::table('pendaftarans')->select('id','penganjur', 'program', 'penerangan_program', 'tarikh_mula', 'tarikh_akhir', 'masa_mula as start', 'masa_akhir as end', 'lokasi', 'kump_sasaran', 'max_peserta', 'status')->get();
    foreach($pendaftarans as $pendaftaran)
    {
        $pendaftaran->program = $pendaftaran->program;
        $pendaftaran->url = url('pendaftaran/' .$pendaftaran->id);
    }
    return $pendaftarans;
  });
Auth::routes();


// Route::group(['middleware' =>  ['auth', 'pengguna']], function() {
//   Route::post('/tempahan', 'TempahansController@store' );
//   Route::get('/tempahan', 'TempahansController@index');
//   Route::get('/tempahan/{tempahan}', 'TempahansController@show');
//
// });
//
//
// Route::group(['middleware' =>  ['auth', 'pentadbir']], function() {
//   Route::get('/listLatihan', 'PendaftaransController@listLatihan');
//   Route::get('/sahLatihan/{pendaftaran}/sahLatihan', 'PendaftaransController@sahLatihan');
//   Route::patch('/sahLatihan/{pendaftaran}', 'PendaftaransController@simpan');
// });
//
// Route::group(['middleware' =>  ['auth', 'penganjur']], function() {
//   Route::get('/pendaftaran', 'PendaftaransController@index');
//   Route::get('/pendaftaran/create', 'PendaftaransController@create');
//   Route::post('/pendaftaran', 'PendaftaransController@store');
//   Route::get('/pendaftaran/{pendaftaran}/edit', 'PendaftaransController@edit');
//   Route::patch('/pendaftaran/{pendaftaran}', 'PendaftaransController@update');
//   Route::get('/listalltempahan', 'TempahansController@listalltempahan');
//   Route::get('/cetakpeserta', 'TempahansController@cetakpeserta');
//   Route::get('/peserta', 'TempahansController@peserta');
//   Route::get('/tempahan/{tempahan}/viewdetail', 'TempahansController@show');
//   Route::patch('/tempahan', 'TempahansController@simpan');
// });

Route::resource('/post', 'PostsController');
Route::resource('/tempahan', 'TempahansController');
  Route::post('/tempahan', 'TempahansController@store' );
  Route::get('/tempahan', 'TempahansController@index');
  Route::get('/tempahan/{tempahan}/viewdetail', 'TempahansController@show');
  Route::post('/tempahan/{tempahan}/simpan', 'TempahansController@simpan');
  Route::get('/listLatihan', 'PendaftaransController@listLatihan');
  Route::get('/sahLatihan/{pendaftaran}/sahLatihan', 'PendaftaransController@sahLatihan');
  Route::patch('/sahLatihan/{pendaftaran}', 'PendaftaransController@simpan');
  Route::get('/pendaftaran', 'PendaftaransController@index');
  Route::get('/pendaftaran/create', 'PendaftaransController@create');
  Route::post('/pendaftaran', 'PendaftaransController@store');
  Route::get('/pendaftaran/{pendaftaran}/edit', 'PendaftaransController@edit');
  Route::patch('/pendaftaran/{pendaftaran}', 'PendaftaransController@update');
  Route::get('/listalltempahan', 'TempahansController@listalltempahan');
  // Route::get('/peserta', 'TempahansController@peserta');
  // Route::get('/cetakpeserta', 'TempahansController@cetakpeserta');
// Route::get('/peserta2', 'TempahansController@peserta');
Route::get('/janalaporan', 'TempahansController@janalaporan');
Route::get('/all', 'TempahansController@all');
Route::get('/all/{tempahan}', 'TempahansController@notification');

Route::get('/test1', 'PendaftaransController@notification');

Route::get('/tempahan/{program}/peserta', 'TempahansController@peserta')->name('tempahan.peserta');

Route::get('/cetakpeserta/{program}', 'TempahansController@cetakpeserta')->name('tempahan.cetakpeserta');



Route::get('test', function () {
        $timestamp = Carbon\Carbon::now();
        $user = auth()->user();
        $user->notify(new App\Notifications\Message());
    })->name('email.test');
