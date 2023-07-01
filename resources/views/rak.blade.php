@extends('layouts.app')

@section('css')
<link href="{{ ('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
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
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalrak">+ Tambah Rak</button>
                </div>
                <div class="card-body">
                    <table id="tablerak" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Rak</th>
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
                            @foreach ($dataRak as $rak)
                            <!-- tampilkan di table -->
                            <tr>
                                <td>{{ $n }}</td>
                                <td>{{ $rak->nama }}</td>
                                <td>{{ $rak->created_at }}</td>
                                <td>
                                    <a href="editrak/{{ $rak->id }}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>

                            @php
                            $n++;
                            @endphp

                            @endforeach
                        </tbody>
                        <!--
                            menggunakan for
                        <tbody>
                            @php
                            $n = 1;
                            //dd($dataRak);exit();
                            @endphp
                            @for ($i = 0; $i < count($dataRak); $i++)
                            <tr>
                                <td>{{ $n }}</td>
                                <td>{{ $dataRak[$i]->nama }}</td>
                                <td>
                                    <a href="editrak?id={{ $dataRak[$i]->id }}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                            @php
                            $n++;
                            @endphp
                            @endfor
                        </tbody>-->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals/modal_add_rak')
@endsection


@section('js')
<script src="{{ ('assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#tablerak').DataTable();
    
    if (modalShow != '') {
        var myModal = new bootstrap.Modal(document.getElementById(modalShow));
        myModal.show();
    }
</script>
@endsection
