@extends('layouts.app')

@section('css')
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Rak</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('doeditrak') }}">
                        @csrf
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="row mb-3">
                            <label class="form-label">Nama: </label>
                            <input type="text" class="form-control" placeholder="Nama Rak" name="nama" value="{{ $data->nama }}">
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
