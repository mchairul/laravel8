<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Template extends Controller
{
    public function index()
    {
        return view("template");
    }

    public function postdata(Request $request)
    {
        //validation
        $request->validate( [
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'nohp' => 'required|min:7|max:13'
        ], [
            'nama.required' => 'nama wajib diisi',
            'nama.min' => 'minimal panjang nama 3',

            'email.required' => 'email wajib diisi',
            'email.email' => 'harap isi email dengan benar',

            'nohp.required' => 'No HP wajib diisi',
            'nohp.min' => 'minimal panjang no hp 7',
            'nohp.max' => 'maksimal panjang no hp 13',
        ] );

        //baca data POST
        $nama = $request->nama;
        $email = $request->email;
        $nohp = $request->nohp;

        //echo 'nama = ' . $nama . "<br>";
        //echo 'email = ' . $email . "<br>";
        //echo 'nohp = ' . $nohp;

        return view('postdata', [
            'nama' => $nama,
            'email' => $email,
            'nohp' => $nohp
        ]);
    }

    public function datanama($nama)
    {
        echo $nama;
    }
}
