<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Produk extends Controller
{
    public function list()
    {
        $nama = [];
        $nama[] = ["produk" => "sampo"];
        $nama[] = ["produk" => "sabun"];
        return view('listproduk', [
            "namaproduk" => $nama,
        ]);
    }
}
