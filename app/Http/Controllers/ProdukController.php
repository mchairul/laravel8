<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Produk;
use App\Models\Rak;
use App\Models\Kategori;

use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    public function index()
    {
        //ambil data produk dari database
        $data = DB::table('produks')
        ->select('produks.*', 'kategoris.nama as nama_kategori', 'raks.nama as nama_raks')
        ->join('kategoris', 'produks.id_kategori', '=', 'kategoris.id')
        ->join('raks', 'produks.id_rak', '=', 'raks.id')
        ->get();

        //ambil data rak dari database, untuk keperluan opsi rak di add produk
        $dataRak = Rak::all();

        //ambil data rak dari database, untuk keperluan opsi kategori di add produk
        $dataKategori = Kategori::all();

        //tampil kan ke view dengan dataRak
        return view('produk', [
            'dataProduk' => $data,
            'dataRaks' => $dataRak,
            'dataKategoris' => $dataKategori
        ]);
    }

    /**
     * terima data post dari view
     */
    public function addproduk(Request $request)
    {
        //validation
        $request->validate([
            'nama' => 'required',
            'rak' => 'required',
            'kategori' => 'required',
            'barcode' => 'required',
        ],[
            'nama.required' => 'Nama Wajib diisi',
            'rak.required' => 'Rak Wajib diisi',
            'kategori.required' => 'Kategori Wajib diisi',
            'barcode.required' => 'barcode Wajib diisi',
        ]);

        //ambil data post dengan name = nama. atau dari input attribut name
        $nama = $request->nama;
        //ambil data post dengan name = rak. atau dari input attribut name
        $rak = $request->rak;
        //ambil data post dengan name = kategori. atau dari input attribut name
        $kategori = $request->kategori;
        //ambil data post dengan name = barcode. atau dari input attribut name
        $barcode = $request->barcode;

        /**
         * Proses simpan ke table rak
         */

        //instanisati RakModel
        $produk = new Produk();

        //set attribut / field table yang akan diinsert
        
         //field id_kategori
         $produk->id_kategori = $kategori;

          //field id_rak
        $produk->id_rak = $rak;

        //field nama
        $produk->nama = $nama;

        //field barcode
        $produk->barcode = $barcode;


        //simpan

        //jika berhasil insert
        if ($produk->save()) {
            Session::flash('pesan_alert', 'Berhasil Tambah Produk');
        } else {
            //jika gagal insert
            Session::flash('pesan_alert', 'Gagal Tambah Produk');
        }

        //kembali ke data rak
        return redirect()->route('produk');
    }

    public function editproduk($id)
    {
        $data = Produk::where('id', $id)->first();

        //ambil data rak dari database, untuk keperluan opsi rak di add produk
        $dataRak = Rak::all();

        //ambil data rak dari database, untuk keperluan opsi kategori di add produk
        $dataKategori = Kategori::all();

        return view('edit_produk', [
            'data' => $data,
            'dataRaks' => $dataRak,
            'dataKategoris' => $dataKategori
        ]);
    }

    public function doeditproduk(Request $request)
    {
        //validation
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'rak' => 'required',
            'kategori' => 'required',
            'barcode' => 'required',
        ],[
            'id.required' => 'ID Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'rak.required' => 'Rak Wajib diisi',
            'kategori.required' => 'Kategori Wajib diisi',
            'barcode.required' => 'barcode Wajib diisi',
        ]);

        $id = $request->id;

        $namaBaru = $request->nama;
        $idKategoriBaru = $request->kategori;
        $idRakBaru = $request->rak;
        $barcodeBaru = $request->barcode;


        //find data yang akan diupdate
        $produk = Produk::find($id);

        //data baru, sebagai pengganti
        $produk->id_kategori = $idKategoriBaru;
        $produk->id_rak = $idRakBaru;
        $produk->nama = $namaBaru;
        $produk->barcode = $barcodeBaru;

        //simpan

        //jika berhasil update
        if ($produk->save()) {
            Session::flash('pesan_alert', 'Berhasil Edit Produk');
        } else {
            //jika gagal update
            Session::flash('pesan_alert', 'Gagal Edit Produk');
        }

        //kembali ke data rak
        return redirect()->route('produk');
    }
}
