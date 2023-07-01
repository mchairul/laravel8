@extends('layouts.app')

@section('css')
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Edit Produk</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('doeditproduk') }}">
                        @csrf
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row mb-3">
                            <label class="form-label">Rak: </label>
                            <select class="form-control {{ $addClass ?? '' }}" name="rak">
                                @foreach($dataRaks as $rak)
                                <option value="{{ $rak->id }}"
                                @if($rak->id == $data->id_rak)
                                selected
                                @endif> {{ $rak->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label class="form-label">Kategori: </label>
                            <select class="form-control {{ $addClass ?? '' }}" name="kategori">
                                @foreach($dataKategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                @if($kategori->id == $data->id_kategori)
                                selected
                                @endif> {{ $kategori->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label class="form-label">Nama: </label>
                            <input type="text" class="form-control" placeholder="Nama Produk}" name="nama" value="{{ $data->nama }}">
                        </div>

                        <div class="row mb-3">
                            <label class="form-label">Barcode: </label>
                            <input type="text" class="form-control" placeholder="Nama Rak" name="barcode" value="{{ $data->barcode }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals/modal_add_rak')
@endsection


@section('js')

@endsection
