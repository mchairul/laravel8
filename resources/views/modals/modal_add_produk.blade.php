<!-- Modal -->
<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" method="POST" action="addproduk">
            <div class="modal-body">
                    @csrf

                    @if($errors->has('rak'))
                        @php
                        $addClass = 'is-invalid';
                        $msgError = $errors->first('rak');
                        @endphp
                        <script>modalShow = 'modalproduk';</script>
                    @endif
                    <label class="form-label">Rak: </label>
                    <select class="form-control {{ $addClass ?? '' }}" name="rak">
                        <option value="">-- Pilih Rak --</option>
                        @foreach($dataRaks as $rak)
                        <option value="{{ $rak->id }}"> {{ $rak->nama }} </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{ $msgError ?? '' }}
                    </div>

                    @if($errors->has('kategori'))
                        @php
                        $addClass = 'is-invalid';
                        $msgError = $errors->first('kategori');
                        @endphp
                        <script>modalShow = 'modalproduk';</script>
                    @endif
                    <label class="form-label">kategori: </label>
                    <select class="form-control {{ $addClass ?? '' }}" name="kategori">
                        <option value="">-- Pilih kategori --</option>
                        @foreach($dataKategoris as $kategori)
                        <option value="{{ $kategori->id }}"> {{ $kategori->nama }} </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{ $msgError ?? '' }}
                    </div>

                    @if($errors->has('nama'))
                        @php
                        $addClass = 'is-invalid';
                        $msgError = $errors->first('nama');
                        @endphp
                        <script>modalShow = 'modalrak';</script>
                    @endif
                    <label class="form-label">Nama: </label>
                    <input type="text" class="form-control {{ $addClass ?? '' }}" placeholder="Nama Produk" name="nama">
                    <div class="invalid-feedback">
                        {{ $msgError ?? '' }}
                    </div>

                    @if($errors->has('barcode'))
                        @php
                        $addClass = 'is-invalid';
                        $msgError = $errors->first('barcode');
                        @endphp
                        <script>modalShow = 'modalrak';</script>
                    @endif
                    <label class="form-label">Nama: </label>
                    <input type="text" class="form-control {{ $addClass ?? '' }}" placeholder="Barcode" name="barcode">
                    <div class="invalid-feedback">
                        {{ $msgError ?? '' }}
                    </div>
                    
            <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
