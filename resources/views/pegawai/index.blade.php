@extends('layouts.master')
@section('title', 'Data Pegawai')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
          
                    <h4 class="card-title pb-4">Data Pegawai @if(auth()->user()->role == 'accounting')<a href="{{route('pegawai.tambah')}}" class="btn btn-primary" style="float: right;">Tambah</a>@endif</h4>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Nama Pegawai </th>
                                    <th> Jabatan </th>
                                    <th> PTKP </th>
                                    <th> NPWP </th>
                                    <th> Status </th>
                                    <th> Agama </th>
                                    <th> Alamat </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // Script datatable
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('pegawai.json')}}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama_pegawai',
                name: 'nama_pegawai'
            },
            {
                data: 'jabatan',
                name: 'jabatan'
            },
            {
                data: 'ptkp',
                name: 'ptkp'
            },
            {
                data: 'npwp',
                name: 'npwp'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'agama',
                name: 'agama'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }
        ],
    });
</script>
@endsection