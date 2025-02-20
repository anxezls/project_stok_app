<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\barangKeluarController;
use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\SuplierController;

Route::get('/',[AuthController::class, 'index']);
Route::post('/',[AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'cekLevel:superadmin,admin'])->group(function(){

    Route::get('/dashboard', [dashboardController::class, 'index']);

    Route::get('/logout', [AuthController::class, 'logout']);





    /**
     * ini routing pegawai
     */

    Route::controller( pegawaiController::class)->group( function(){

        Route::get('/pegawai', 'index');

        Route::post('/pegawai/add', 'store')->name('addPegawai');

        Route::get('pegawai/edit/{id}', 'edit');
        Route::post('pegawai/edit/{id}', 'update'); //->disini

        Route::get('/pegawai/delete/{id}', 'destroy');


    });
    /**
     * ini routing stok
    */
    Route::controller(stokController::class)->group(function(){


        Route::get('/stok', 'index');

        Route::get('/stok/add', 'create');
        Route::post('/stok/add', 'store');

        Route::get('/stok/edit{id}', 'edit');
        Route::post('/stok/edit{id}', 'update');


    });





  /**
   * ini routing barang masuk
   */
  Route::controller(BarangMasukController::class)->group(function(){
    Route::get('/barang-masuk', 'index');

    Route::get('/barang-masuk/add', 'create');
    Route::post('/barang-masuk/add', 'store');


  });





   /**
    * ini routing barang keluar
    */
    Route::controller(barangKeluarController::class)->group(function(){
        Route::get('/barang-keluar', 'index');

        Route::get('/barang-keluar/add', 'create');
        Route::post('barang-keluar/add', 'store');

        Route::post('barang-keluar/save', 'saveBarangKeluar')->name('addBarangKeluar');


    });




    /**
     * ini routing pelanggan
     */
     route::controller(pelangganController::class)->group( function(){
        route::get('/pelanggan', 'index');

        route::get('/pelanggan/add', 'create');
        route::post('/pelanggan/add', 'store');

        route::get('/pelanggan/edit/{id}', 'edit');
        route::post('/pelanggan/edit/{id}', 'update');

        route::get('/pelanggan/{id}', 'destroy');
     });





     /**
      * ini routing supplier
      */

    Route::controller(SuplierController::class)->group(function(){

        Route::get('/suplier', 'index');

        Route::get('/suplier/add', 'create');
        Route::post('/suplier/add', 'store');
        Route::get('/suplier/edit/{id}', 'edit');
        Route::post('/suplier/edit/{id}', 'update');
        Route::get('/suplier/{id}', 'destroy');



    });
});


