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

Route::get('/inspeksi-kecelakaan', function () {
    return view('kecelakaan.index');
})->name('kecelakaan');

Route::get('/inspeksi-kecelakaan/tambah', function () {
    return view('kecelakaan.add');
})->name('kecelakaan.add');


Route::get('/inspeksi-ketidaksesuaian', function () {
    return view('ketidaksesuaian.index');
})->name('ketidaksesuaian');

Route::get('/inspeksi-ketidaksesuaian/tambah', function () {
    return view('ketidaksesuaian.add');
})->name('ketidaksesuaian.add');

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
