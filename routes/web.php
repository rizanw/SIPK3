<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/scan', function (){
    return view('qr-scan');
})->name('qr.scan');

Route::prefix('inspeksi-kebakaran-aktif')->group(function () {
    Route::get('/', 'KebakaranAktif@index')->name('kebakaran');
    Route::get('/fetch', 'KebakaranAktif@fetch')->name('kebakaran.fetch');
    Route::prefix('/apar')->group(function () {
        Route::get('/{id}/qr-download', function ($id) {
            $image = \QrCode::format('png')
                ->size(500)
                ->generate(\route('kebakaran.apar.add.byId', $id));
            return response($image)->header('Content-type','image/png');
        })->name('kebakaran.apar.qr');
        Route::get('/tambah', 'KebakaranAktif@addAparIndex')->name('kebakaran.apar.add');
        Route::get('/tambah/{id}', 'KebakaranAktif@addAparByIdIndex')->name('kebakaran.apar.add.byId');
        Route::post('/post', 'KebakaranAktif@createApar')->name('kebakaran.apar.create');
        Route::get('/{id}', 'KebakaranAktif@detailAparIndex')->name('kebakaran.apar.detail');
    });
    Route::prefix('/hydrant')->group(function () {
        Route::get('/{id}/qr-download', function ($id) {
            $image = \QrCode::format('png')
                ->size(500)
                ->generate(\route('kebakaran.hydrant.add.byId', $id));
            return response($image)->header('Content-type','image/png');
        })->name('kebakaran.hydrant.qr');
        Route::get('/tambah', 'KebakaranAktif@addHydrantIndex')->name('kebakaran.hydrant.add');
        Route::get('/tambah/{id}', 'KebakaranAktif@addHydrantByIdIndex')->name('kebakaran.hydrant.add.byId');
        Route::post('/post', 'KebakaranAktif@createHydrant')->name('kebakaran.hydrant.create');
        Route::get('/{id}', 'KebakaranAktif@detailHydrantIndex')->name('kebakaran.hydrant.detail');
    });
});

Route::prefix('alat-kebakaran')->group(function () {
    Route::get('/', 'AlatKebakaran@index')->name('kebakaran.alat');
    Route::get('/fetch', 'AlatKebakaran@fetch')->name('kebakaran.alat.fetch');
    Route::prefix('/apar')->group(function () {
        Route::get('/tambah', 'AlatKebakaran@addAparIndex')->name('kebakaran.alat.apar');
        Route::post('/post', 'AlatKebakaran@createApar')->name('kebakaran.alat.apar.create');
        Route::get('/{id}', 'AlatKebakaran@detailAparIndex')->name('kebakaran.alat.apar.detail');
    });
    Route::prefix('/hydrant')->group(function () {
        Route::get('/tambah', 'AlatKebakaran@addHydrantIndex')->name('kebakaran.alat.hydrant');
        Route::post('/post', 'AlatKebakaran@createHydrant')->name('kebakaran.alat.hydrant.create');
        Route::get('/{id}', 'AlatKebakaran@detailHydrantIndex')->name('kebakaran.alat.hydrant.detail');
    });
});

Route::prefix('inspeksi-ketidaksesuaian')->group(function () {
    Route::get('/', 'KetidaksesuaianController@index')->name('ketidaksesuaian');
    Route::get('/fetch', 'KetidaksesuaianController@fetch')->name('ketidaksesuaian.fetch');
    Route::get('/tambah', 'KetidaksesuaianController@indexAdd')->name('ketidaksesuaian.add');
    Route::post('/post', 'KetidaksesuaianController@create')->name('ketidaksesuaian.create');
    Route::post('/update/status', 'KetidaksesuaianController@updateStatus')->name('ketidaksesuaian.update.status');
    Route::get('/{id}', 'KetidaksesuaianController@indexDetail')->name('ketidaksesuaian.detail');
});

Route::prefix('inspeksi-kecelakaan')->group(function () {
    Route::get('/', 'KecelakaanController@index')->name('kecelakaan');
    Route::get('/fetch', 'KecelakaanController@fetch')->name('kecelakaan.fetch');
    Route::get('/tambah', 'KecelakaanController@indexAdd')->name('kecelakaan.add');
    Route::post('/post', 'KecelakaanController@create')->name('kecelakaan.create');
    Route::post('/update/status', 'KecelakaanController@updateStatus')->name('kecelakaan.update.status');
    Route::get('/{id}', 'KecelakaanController@indexDetail')->name('kecelakaan.detail');
});

Route::prefix('maintaince')->group(function () {
    Route::get('/', 'MaintainceController@index')->name('maintaince');
    Route::get('/fetch', 'MaintainceController@fetch')->name('maintaince.fetch');
    Route::prefix('/ketidaksesuian')->group(function () {
        Route::get('/tambah', 'MaintainceController@indexAddKetidaksesuian')->name('maintaince.ketidaksesuian.add');
        Route::post('/post', 'MaintainceController@create')->name('maintaince.ketidaksesuian.post');
        Route::get('/{id}', 'MaintainceController@indexDetailKetidaksesuian')->name('maintaince.ketidaksesuian.detail');
    });
    Route::prefix('/kecelakaan')->group(function () {
        Route::get('/tambah', 'MaintainceController@indexAddKecelakaan')->name('maintaince.kecelakaan.add');
        Route::post('/post', 'MaintainceController@create')->name('maintaince.kecelakaan.post');
        Route::get('/{id}', 'MaintainceController@indexDetailKecelakaan')->name('maintaince.kecelakaan.detail');
    });
});

Route::prefix('/jadwal')->group(function () {
    Route::get('/', 'JadwalController@index')->name('jadwal');
    Route::get('/fetch', 'JadwalController@fetch')->name('jadwal.fetch');
    Route::get('/fetch/{tim}', 'JadwalController@fetchByTim')->name('jadwal.fetch.tim');
    Route::get('/tambah', 'JadwalController@indexAdd')->name('jadwal.add');
    Route::post('/post', 'JadwalController@create')->name('jadwal.create');
    Route::get('/{id}', 'JadwalController@indexDetail')->name('jadwal.detail');
});
