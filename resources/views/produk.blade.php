@extends('layouts.app')

@section('css')
<link href="{{ ('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Produk</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalproduk">+ Tambah Produk</button>
                </div>
                <div class="card-body">
                    <table id="tablerak" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Nama Rak</th>
                                <th>Nama Kategori</th>
                                <th>Barcode</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- buat variable $n untuk keperluan nomor -->
                            @php
                            $n = 1;
                            //dd($dataRak);exit();
                            @endphp

                            <!-- loop data $dataRak-->
                            @foreach ($dataProduk as $produk)
                            <!-- tampilkan di table -->
                            <tr>
                                <td>{{ $n }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->nama_raks }}</td>
                                <td>{{ $produk->nama_kategori }}</td>
                                <td>{!! DNS1D::getBarcodeHTML($produk->barcode,'C39') !!}</td>
                                <td>{{ $produk->created_at }}</td>
                                <td>
                                    <a href="editproduk/{{ $produk->id }}" class="btn btn-warning">Edit</a>
                                    <a href="barcode/{{ $produk->barcode }}" class="btn btn-primary" target="_blank">Print</a>
                                </td>
                            </tr>

                            @php
                            $n++;
                            @endphp

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals/modal_add_produk')
@endsection


@section('js')
<script src="{{ ('assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
    $('#tablerak').DataTable();
    
    if (modalShow != '') {
        var myModal = new bootstrap.Modal(document.getElementById(modalShow));
        myModal.show();
    }
</script>
@endsection
