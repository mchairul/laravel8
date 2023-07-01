@extends('layouts.app')

@section('css')
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Cari</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div id="qr-reader" style="width: 100%"></div>
                    <form method="POST" action="">
                        @csrf
                        <div class="row mb-3">
                            <label class="form-label">Barcode: </label>
                            <input type="text" class="form-control" placeholder="Barcode" name="barcode" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    <div class="row">
                        @if(isset($data))
                            Nama = {{ $data[0]->nama ?? 'Tidak ditemukan' }}
                            <br>
                            Nama Rak = {{ $data[0]->nama_raks ?? 'Tidak ditemukan' }}
                            <br>
                            Nama Kategori = {{ $data[0]->nama_kategori ?? 'Tidak ditemukan' }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals/modal_add_rak')
@endsection


@section('js')
<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        //console.log(`Code scanned = ${decodedText}`, decodedResult);
        window.location.href = '{{ URL::to('/') }}/docari/' + decodedText;
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);

</script>
@endsection
