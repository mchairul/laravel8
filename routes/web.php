<?php

use Illuminate\Support\Facades\Route;

//panggil controller
use App\Http\Controllers\Produk;
use App\Http\Controllers\Template;
use App\Http\Controllers\Barang;

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