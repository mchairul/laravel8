<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

use Illuminate\Support\Facades\DB;

class Cari extends Controller
{
    public function index()
    {
        return view('cari');
    }

    public function docari($barcode)
    {
        //ambil data produk dari database
        $data = DB::table('produks')
        ->select('produks.*', 'kategoris.nama as nama_kategori', 'raks.nama as nama_raks')
        ->join('kategoris', 'produks.id_kategori', '=', 'kategoris.id')
        ->join('raks', 'produks.id_rak', '=', 'raks.id')
        ->where('produks.barcode', '=', $barcode)
        ->get();

        //var_dump($data);exit;
        return view('cari',[
            'data' => $data
        ]);
    }
}
