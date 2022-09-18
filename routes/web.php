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
	return redirect('/login');
});
Route::get('/home', function () {
	return redirect('/dashboard');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('auth')->name('dashboard');

//Surat Dashboard
Route::prefix('surat')->group(function() {
	Route::get('/masuk', 'MailController@masuk')->name('surat_masuk')->middleware('auth');
	Route::get('/keluar', 'MailController@keluar')->name('surat_keluar')->middleware('auth');
	Route::get('/detail/{id}', 'MailController@detail')->name('detail_surat')->middleware('auth');
	Route::get('/surat', 'MailController@surat')->name('form_surat')->middleware('auth');
	Route::get('/hapus/{id}', 'MailController@hapus')->name('hapus_surat')->middleware('auth');
	Route::post('/tambah', 'MailController@tambah')->name('tambah_surat')->middleware('auth');
	Route::post('/cari','MailController@cari')->name('cari_surat')->middleware('auth');

	Route::post('/uploadfile','MailController@upload')->name('uploadfile')->middleware('auth');
	Route::get('/uploadfile','MailController@index')->name('uploadfile')->middleware('auth');
	
	Route::get('download/{file_name}', 'MailController@download')->name('download');

});

//tipe
Route::prefix('tipe')->group(function() {
	Route::get('/create', 'TypeController@create')->name('form_tipe')->middleware('auth');
	Route::put('/edit/{id}', 'TypeController@edit')->name('edit_tipe')->middleware('auth');
	Route::post('/store', 'TypeController@store')->name('tambah_tipe')->middleware('auth');
	Route::post('/cari', 'TypeController@cari')->name('tambah_cari')->middleware('auth');
	Route::get('/destroy/{id}', 'TypeController@destroy')->name('hapus_tipe')->middleware('auth');
});

//users
Route::prefix('users')->group(function(){
	Route::get('/baca', 'UserController@baca')->name('form_user')->middleware('auth');
	Route::get('/hapus/{id}', 'UserController@hapus')->name('hapus_user')->middleware('auth');
	Route::put('/edit/{id}', 'UserController@edit')->name('edit_user')->middleware('auth');
	Route::post('/tambah', 'UserController@tambah')->name('tambah_user')->middleware('auth');
	Route::post('/cari', 'UserController@cari')->name('cari_user')->middleware('auth');
});


//disposisi
Route::prefix('disposisi')->group(function(){
	Route::get('/masuk', 'DispositionController@masuk')->name('disposisi_masuk')->middleware('auth');
	Route::get('/keluar', 'DispositionController@keluar')->name('disposisi_keluar')->middleware('auth');
	Route::post('/kirim', 'DispositionController@tambah')->name('tambah_disposisi')->middleware('auth');
	Route::post('/cari', 'DispositionController@cari')->name('cari_disposisi')->middleware('auth');
	Route::get('/detail/{id}', 'DispositionController@detail')->name('detail_disposisi')->middleware('auth');
	Route::get('/hapus/{id}', 'DispositionController@hapus')->name('hapus_disposisi')->middleware('auth');
});


//laporan
Route::post('/laporan', 'MailController@laporan_post')->name('form_laporan')-> middleware('auth');
Route::get('/laporan', 'MailController@laporan')->name('laporan')->middleware('auth');
Route::get('/pdfview',array('as'=>'pdfview','uses'=>'La@pdfview'));

//Upload
Route::get('/uploadfile','UploadController@index');
Route::post('/uploadfile', 'UploadController@insert');

// //Upload
// Route::get('/uploadfile','UploadController@index')->name('upload_surat')->middleware('auth');
// Route::post('/uploadfile', 'UploadController@insert')->name('upload_surat')->middleware('auth');
