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
    return view('login');
});

Route::get('/loginadmin', function () {
    if(Auth::check()) {
        return redirect()->route('home');
    } 
    return view('login');
});

Route::get('logout', function() {
    Auth::logout();
    return redirect()->to('/');
})->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route User
Route::get('/user', 'UserController@index')->name('user');
Route::post('/user/simpan', 'UserController@store')->name('simpanuser');
Route::post('/user/edit', 'UserController@update')->name('edituser');
Route::get('/user/delete/{id}', 'UserController@delete');

//Route Roles
Route::get('/role', 'RoleController@index')->name('role');
Route::post('/role/save', 'RoleController@store')->name('saverole');
Route::get('/role/delete/{id}', 'RoleController@delete');
Route::post('/role/update', 'RoleController@update')->name('updateRole');

// Route Instansi
Route::get('/instansi', 'InstansiController@index')->name('instansi');
Route::post('/instansi/save', 'InstansiController@store')->name('saveInstansi');
Route::post('/instansi/update', 'InstansiController@update')->name('updateInstansi');
Route::get('/instansi/delete/{id}', 'InstansiController@delete');

//Route Kecamatan
Route::get('/kecamatan', 'KecamatanController@index')->name('kecamatan');
Route::post('/kecamatan/save', 'KecamatanController@store')->name('saveKecamatan');
Route::post('/kecamatan/update', 'KecamatanController@update')->name('updateKecamatan');
Route::get('/kecamatan/delete/{id}', 'KecamatanController@delete');

//Route Kelurahan
Route::get('/kelurahan', 'KelurahanController@index')->name('kelurahan');
Route::post('/kelurahan/save', 'KelurahanController@store')->name('saveKelurahan');
Route::post('/kelurahan/update', 'KelurahanController@update')->name('updateKelurahan');
Route::get('/kelurahan/delete/{id}', 'KelurahanController@delete');

//Route Agama
Route::get('/agama', 'AgamaController@index')->name('agama');
Route::post('/agama/save', 'AgamaController@store')->name('saveAgama');
Route::post('/agama/update', 'AgamaController@update')->name('updateAgama');
Route::get('/agama/delete/{id}', 'AgamaController@delete');

//Route Pemohon
Route::get('/pemohon', 'PemohonController@index')->name('pemohon');
Route::get('/pemohon/add', 'PemohonController@add')->name('addPemohon');
Route::get('/pemohon/dataDesa/{id}', 'PemohonController@dataDesa');
Route::post('/pemohon/save', 'PemohonController@store')->name('savePemohon');
Route::post('/pemohon/update/{id}', 'PemohonController@update')->name('updatePemohon');
Route::get('/pemohon/delete/{id}', 'PemohonController@delete');
Route::get('/pemohon/edit/{id}', 'PemohonController@edit');
Route::post('/pemohon/akun/save', 'PemohonController@storeAkun')->name('saveAkunPemohon');

//Route Berkas
Route::get('/berkas', 'BerkasController@index')->name('berkas');
Route::get('/berkas/add', 'BerkasController@add')->name('addBerkas');
Route::post('/berkas/save', 'BerkasController@store')->name('saveBerkas');
Route::post('/berkas/update', 'BerkasController@update')->name('updateBerkas');
Route::get('/berkas/delete/{id}', 'BerkasController@delete');
Route::get('/berkas/dataDesa/{id}', 'PemohonController@dataDesa');

//Route Untuk Laporan
Route::get('/lappemohon', 'LaporanController@pemohon')->name('lap.pemohon');
Route::get('/lapberkas', 'LaporanController@berkas')->name('lap.berkas');

//Route Untuk Print
Route::post('/pdf/pemohon', 'PdfController@pemohon')->name('pdfpemohon');
Route::post('/pdf/berkas', 'PdfController@berkas')->name('pdfberkas');
Route::get('/pdf/pemohon/all', 'PdfController@pemohonAll')->name('lap.pemohon.all');

// Route::get('/home/delete/{id}', 'HomeController@delete');
// Route::get('/home/edit/{id}', 'HomeController@edit');
// Route::post('/home/update/{id}', 'HomeController@update')->name('updateAgenda');

// Route::get('/pdf/totalAgenda', 'PdfController@agendaAll')->name('totalAgenda');
// Route::get('/pdf/agendaToday', 'PdfController@agendaToday')->name('agendaToday');
// Route::get('/pdf/agendaMonth', 'PdfController@agendaMonth')->name('agendaMonth');
// Route::get('/pdf/report', 'PdfController@pdf')->name('pdf');
// Route::post('/pdf/report/print', 'PdfController@printpdf')->name('printpdf');
