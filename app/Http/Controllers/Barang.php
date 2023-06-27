<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang as ModelBarang;

class Barang extends Controller
{
    public function listBarang()
    {
        //ambil data dari table 
        $data = ModelBarang::all();

        //lempar data ke view
        return view('listbarang', [
            'dataBarang' => $data,
        ]);
    }
}
