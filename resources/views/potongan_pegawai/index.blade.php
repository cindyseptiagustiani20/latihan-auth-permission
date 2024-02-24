@extends('layouts.master')
@section('title', 'Data Potongan Pegawai')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title pb-4">Data Potongan Pegawai <a href="{{route('potongan_pegawai.tambah')}}" class="btn btn-primary" style="float: right;">Tambah</a></h4>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Nama Pegawai </th>
                                    <th> Potongan </th>
                                    <th> Jumlah </th>
                                    <th> Total </th>
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
        ajax: "{{route('potongan_pegawai.json')}}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'id_pegawai',
                name: 'id_pegawai'
            },
            {
                data: 'id_potongan',
                name: 'id_potongan'
            },
            {
                data: 'jumlah',
                name: 'jumlah'
            },
            {
                data: 'total',
                name: 'total'
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