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
Route::post('/cariberkas', 'HomeController@cariberkas')->name('cariberkas');
Route::get('/direction', 'HomeController@direction')->name('direction');

//Route Arsip
Route::get('/arsip', 'ArsipController@index')->name('arsip');
Route::get('/arsip/add', 'ArsipController@add')->name('addArsip');
Route::post('/arsip/edit', 'ArsipController@update')->name('editarsip');
Route::get('/arsip/delete/{id}', 'ArsipController@delete');
Route::post('/arsip/store', 'ArsipController@store')->name('saveArsip');

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

//Route Status
Route::get('/status', 'StatusController@index')->name('status');
Route::get('/status/add', 'StatusController@add')->name('addStatus');
Route::post('/status/save', 'StatusController@store')->name('savestatus');
Route::get('/status/delete/{id}', 'StatusController@delete');
Route::get('/status/edit/{id}', 'StatusController@edit');
Route::post('/status/update/{id}', 'StatusController@update')->name('updatestatus');

// Route Instansi
Route::get('/instansi', 'InstansiController@index')->name('instansi');
Route::post('/instansi/save', 'InstansiController@store')->name('saveInstansi');
Route::post('/instansi/update', 'InstansiController@update')->name('updateInstansi');
Route::get('/instansi/delete/{id}', 'InstansiController@delete');

// Route Petugas
Route::get('/petugas', 'PetugasController@index')->name('petugas');
Route::get('/petugas/add', 'PetugasController@add')->name('addPetugas');
Route::post('/petugas/save', 'PetugasController@store')->name('savePetugas');
Route::post('/petugas/update/{id}', 'PetugasController@update')->name('updatePetugas');
Route::get('/petugas/delete/{id}', 'PetugasController@delete');
Route::get('/petugas/edit/{id}', 'PetugasController@edit');

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
Route::post('/berkas/update/{id}', 'BerkasController@update')->name('updateBerkas');
Route::get('/berkas/delete/{id}', 'BerkasController@delete');
Route::get('/berkas/edit/{id}', 'BerkasController@edit');
Route::get('/berkas/dataDesa/{id}', 'PemohonController@dataDesa');

Route::get('/berkas/upload/{id}', 'BerkasController@upload');
Route::get('/berkas/upload/{id}/delete', 'BerkasController@uploadDelete');
Route::post('/berkas/upload/store/{id}', 'BerkasController@uploadStore')->name('saveUpload');

//Route Untuk Laporan
Route::get('/lappemohon', 'LaporanController@pemohon')->name('lap.pemohon');
Route::get('/lapbersertifikat', 'LaporanController@bersertifikat')->name('lap.bersertifikat');
Route::get('/laparsip', 'LaporanController@arsip')->name('lap.arsip');
Route::get('/lapberkas', 'LaporanController@berkas')->name('lap.berkas');
Route::get('/lapberkasselesai', 'LaporanController@berkasselesai')->name('lap.berkasselesai');
Route::get('/laptunggakan', 'LaporanController@tunggakan')->name('lap.tunggakan');
Route::get('/lapberkas/cetak', 'LaporanController@cetakberkas')->name('lap.cetakberkas');
Route::get('/lappetugasukur', 'LaporanController@petugasukur')->name('lap.petugasukur');
Route::get('/lapnonpertanian', 'LaporanController@nonpertanian')->name('lap.nonpertanian');
Route::get('/lappertanian', 'LaporanController@pertanian')->name('lap.pertanian');
Route::get('/lapinstansi', 'LaporanController@instansi')->name('lap.instansi');
Route::get('/lapttdberkas', 'LaporanController@ttdberkas')->name('lap.ttdberkas');

//Route Untuk Print
Route::post('/pdf/pemohon', 'PdfController@pemohon')->name('pdfpemohon');
Route::post('/pdf/berkas', 'PdfController@berkas')->name('pdfberkas');
Route::post('/pdf/berkasselesai', 'PdfController@berkasselesai')->name('lap.berkasselesai.all');
Route::post('/pdf/cetakberkas', 'PdfController@cetakberkas')->name('pdfcetakberkas');
Route::post('/pdf/ttdberkas', 'PdfController@ttdberkas')->name('pdfttdberkas');
Route::get('/pdf/pemohon/all', 'PdfController@pemohonAll')->name('lap.pemohon.all');
Route::get('/pdf/bersertifikat', 'PdfController@bersertifikat')->name('lap.bersertifikat.all');
Route::get('/pdf/tunggakan', 'PdfController@tunggakan')->name('lap.tunggakan.all');
Route::get('/pdf/arsip', 'PdfController@arsip')->name('lap.arsip.all');
Route::get('/pdf/petugasukur', 'PdfController@petugasukur')->name('lap.petugasukur.all');
Route::get('/pdf/nonpertanian', 'PdfController@nonpertanian')->name('lap.nonpertanian.all');
Route::get('/pdf/pertanian', 'PdfController@pertanian')->name('lap.pertanian.all');
Route::get('/pdf/instansi', 'PdfController@instansi')->name('lap.instansi.all');


Route::get('/sertifikatuser', 'MemberController@index')->name('sertifikatuser');

// Route::get('/home/delete/{id}', 'HomeController@delete');
// Route::get('/home/edit/{id}', 'HomeController@edit');
// Route::post('/home/update/{id}', 'HomeController@update')->name('updateAgenda');

// Route::get('/pdf/totalAgenda', 'PdfController@agendaAll')->name('totalAgenda');
// Route::get('/pdf/agendaToday', 'PdfController@agendaToday')->name('agendaToday');
// Route::get('/pdf/agendaMonth', 'PdfController@agendaMonth')->name('agendaMonth');
// Route::get('/pdf/report', 'PdfController@pdf')->name('pdf');
// Route::post('/pdf/report/print', 'PdfController@printpdf')->name('printpdf');
