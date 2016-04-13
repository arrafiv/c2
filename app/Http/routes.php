<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', 'Controller@loginsso');
Route::get('/home', 'Controller@loginredirect');
Route::get('/logout', 'Controller@logout');

#halaman berisi form create pengajuan [localhost:8000/ijin]
Route::get('/pengajuanijin', 'Controller@getCreateIzin'); 
Route::post('action/pengajuanijin/create', 'Controller@createizin'); 
#{return view('action/pengajuanijin/ijin'); });

#Memproses form lalu mengirimnya ke database
Route::post('/pengajuanijin', function() {
	return 'Proses Tambah Kegiatan'; });

#Menampilkan Pengajuan Ijin [localhost:8000/read{id}]
Route::get('/pengajuanijin/read', function() {
	return 'Halaman Pengajuan Ijin Peruser'; });


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
