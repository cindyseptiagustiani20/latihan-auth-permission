@extends('layouts.master')
@section('title', 'Data PTKP')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title pb-4">Data PTKP <a href="{{route('PTKP.tambah')}}" class="btn btn-primary" style="float: right;">Tambah</a></h4>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Kode PTKP </th>
                                    <th> Nama PTKP </th>
                                    <th> Jumlah </th>
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
        ajax: "{{route('PTKP.json')}}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'kode_ptkp',
                name: 'kode_ptkp'
            },
            {
                data: 'nama_ptkp',
                name: 'nama_ptkp'
            },
            {
                data: 'jumlah',
                name: 'jumlah'
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