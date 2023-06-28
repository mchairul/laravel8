<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rak;
use App\Models\Produk;
use App\Models\Peminjaman;

class Dashboard extends Controller
{
    public function index()
    {
        $jumlahRak = Rak::count();
        $jumlahProduk = Produk::count();
        $jumlahPeminjaman = Peminjaman::count();

        return view('dashboard', [
            'jumlahRak' => $jumlahRak,
            'jumlahProduk' => $jumlahProduk,
            'jumlahPeminjaman' => $jumlahPeminjaman
        ]);
    }
}
