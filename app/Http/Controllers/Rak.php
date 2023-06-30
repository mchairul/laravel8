<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rak as RakModel;

use Illuminate\Support\Facades\Session;


class Rak extends Controller
{
    public function index()
    {
        //ambil data rak dari database
        $data = RakModel::all();

        //tampil kan ke view dengan dataRak
        return view('rak', [
            'dataRak' => $data
        ]);
    }

    public function addrak(Request $request)
    {
        //validation
        $request->validate([
            'nama' => 'required'
        ],[
            'nama.required' => 'Nama Wajib diisi'
        ]);

        //ambil data post dengan name = nama. atau dari input attribut name
        $nama = $request->nama;

        /**
         * Proses simpan ke table rak
         */

        //instanisati RakModel
        $rak = new RakModel();

        //set attribut / field table yang akan diinsert
        
        //field nama
        $rak->nama = $nama;

        //simpan

        //jika berhasil insert
        if ($rak->save()) {
            Session::flash('pesan_alert', 'Berhasil Tambah Rak');
        } else {
            //jika gagal insert
            Session::flash('pesan_alert', 'Gagal Tambah Rak');
        }

        //kembali ke data rak
        return redirect()->route('rak');
    }

    public function editrak($id)
    {
        $data = RakModel::where('id', $id)->first();

        return view('edit_rak', [
            'data' => $data
        ]);
    }

    public function doeditrak(Request $request)
    {
        //validation
        $request->validate([
            'id' => 'required',
            'nama' => 'required'
        ],[
            'id.required' => 'ID Wajib diisi',
            'nama.required' => 'Nama Wajib diisi'
        ]);

        $id = $request->id;

        //ambil data post dengan name = nama. atau dari input attribut name
        $namaBaru = $request->nama;

        //find data yang akan diupdate
        $rak = RakModel::find($id);

        //data baru, sebagai pengganti
        $rak->nama = $namaBaru;

        //simpan

        //jika berhasil update
        if ($rak->save()) {
            Session::flash('pesan_alert', 'Berhasil Edit Rak');
        } else {
            //jika gagal update
            Session::flash('pesan_alert', 'Gagal Edit Rak');
        }

        //kembali ke data rak
        return redirect()->route('rak');
    }
}
