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

Route::prefix('inspeksi-kebakaran-aktif')->group(function () {
    Route::get('/', 'KebakaranAktif@index')->name('kebakaran');
    Route::get('/fetch', 'KebakaranAktif@fetch')->name('kebakaran.fetch');
    Route::prefix('/apar')->group(function () {
        Route::get('/tambah', 'KebakaranAktif@addAparIndex')->name('kebakaran.apar.add');
        Route::post('/post', 'KebakaranAktif@createApar')->name('kebakaran.apar.create');
    });
    Route::prefix('/hydrant')->group(function () {
        Route::get('/tambah', 'KebakaranAktif@addHydrantIndex')->name('kebakaran.hydrant.add');
        Route::post('/post', 'KebakaranAktif@createHydrant')->name('kebakaran.hydrant.create');

    });
});

Route::prefix('alat-kebakaran')->group(function () {
    Route::get('/', 'AlatKebakaran@index')->name('kebakaran.alat');
    Route::get('/fetch', 'AlatKebakaran@fetch')->name('kebakaran.alat.fetch');
    Route::prefix('/apar')->group(function () {
        Route::get('/tambah', 'AlatKebakaran@addAparIndex')->name('kebakaran.alat.apar');
        Route::post('/post', 'AlatKebakaran@createApar')->name('kebakaran.alat.apar.create');
    });
    Route::prefix('/hydrant')->group(function () {
        Route::get('/tambah', 'AlatKebakaran@addHydrantIndex')->name('kebakaran.alat.hydrant');
        Route::post('/post', 'AlatKebakaran@createHydrant')->name('kebakaran.alat.hydrant.create');
    });
});

Route::prefix('inspeksi-ketidaksesuaian')->group(function () {
    Route::get('/', 'KetidaksesuaianController@index')->name('ketidaksesuaian');
    Route::get('/fetch', 'KetidaksesuaianController@fetch')->name('ketidaksesuaian.fetch');
    Route::get('/tambah', 'KetidaksesuaianController@indexAdd')->name('ketidaksesuaian.add');
    Route::post('/post', 'KetidaksesuaianController@create')->name('ketidaksesuaian.create');
    Route::get('/{id}', 'KetidaksesuaianController@indexDetail')->name('ketidaksesuaian.detail');
});

Route::prefix('inspeksi-kecelakaan')->group(function () {
    Route::get('/', 'KecelakaanController@index')->name('kecelakaan');
    Route::get('/fetch', 'KecelakaanController@fetch')->name('kecelakaan.fetch');
    Route::get('/tambah', 'KecelakaanController@indexAdd')->name('kecelakaan.add');
    Route::post('/post', 'KecelakaanController@create')->name('kecelakaan.create');
});
