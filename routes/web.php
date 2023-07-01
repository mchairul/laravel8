<?php

use Illuminate\Support\Facades\Route;

//panggil controller
use App\Http\Controllers\Produk;
use App\Http\Controllers\Template;
use App\Http\Controllers\Barang;
use App\Http\Controllers\Blank;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Rak;
use App\Http\Controllers\ProdukController;

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

Route::get('/text', function () {
    return 'Coba Text';
});

Route::get('/strhtml', function () {
    echo '<h1>Html</h1>';
    echo '<p style="color:red;">Html</p>';
});

Route::get('/nama/{budi}', function ($nama) {
    return 'Hallo ' . $nama;
});

Route::get('data/{nama}', [Template::class, 'datanama']);

Route::prefix('/admin')->group(function () {
    Route::get('/mahasiswa', function () {
        echo 'mahasiswa';
    });
    Route::get('/dosen', function () {
        echo 'dosen';
    });
    Route::get('/karyawan', function () {
        echo 'karyawan';
    });
});

Route::fallback(function () {
    return view('404');
});

Route::get('produk', [Produk::class, 'list']);

//                      Class Controller , function
Route::get('template', [Template::class, 'index']);

Route::get('form', function(){
    return view('form');
});

Route::post('postdata', [Template::class, 'postdata']);

Route::get('listbarang', [Barang::class, 'listBarang']);

///

Route::get('blank', [Blank::class, 'index']);


/**
 * studi kasus
 */

Route::get('/', [Login::class, 'login'])->name('login');

Route::post('auth/login', [Login::class, 'authlogin'])->name('authlogin');

Route::get('logout', [Login::class, 'logout'])->name('logout');

//named route

//Dashboard
Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard')
->middleware('auth');

/**
 * RAK
 */
//show rak
Route::get('rak', [Rak::class, 'index'])->name('rak')
->middleware('auth');

//add rak
Route::post('addrak', [Rak::class, 'addrak'])->name('addrak')
->middleware('auth');

//edit
Route::get('editrak/{id}', [Rak::class, 'editrak'])->name('editrak')
->middleware('auth');

//do edit
Route::post('doeditrak', [Rak::class, 'doeditrak'])->name('doeditrak')
->middleware('auth');

/**
 * Produk
 */
//show rak
Route::get('produk', [ProdukController::class, 'index'])->name('produk')
->middleware('auth');

//add product
Route::post('addproduk', [ProdukController::class, 'addproduk'])->name('addproduk')
->middleware('auth');

//edit
Route::get('editproduk/{id}', [ProdukController::class, 'editproduk'])->name('editproduk')
->middleware('auth');

//barcode
Route::get('barcode/{code}', function($barcode) {
    return view('barcode',['data'=>$barcode]);
})->name('barcode')
->middleware('auth');

//do edit
Route::post('doeditproduk', [ProdukController::class, 'doeditproduk'])->name('doeditproduk')
->middleware('auth');
