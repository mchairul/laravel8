<!-- Modal -->
<div class="modal fade" id="modalrak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form" method="POST" action="addrak">
            <div class="modal-body">
                    @csrf

                    @if($errors->has('nama'))
                        @php
                        $addClass = 'is-invalid';
                        $msgError = $errors->first('nama');
                        @endphp
                        <script>modalShow = 'modalrak';</script>
                    @endif
                    <label class="form-label">Nama: </label>
                    <input type="text" class="form-control {{ $addClass ?? '' }}" placeholder="Nama Rak" name="nama">
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
