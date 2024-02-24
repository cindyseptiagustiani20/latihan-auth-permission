@extends('layouts.master')
@section('title', 'Data Jabatan')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title pb-4">Data Jabatan <a href="{{route('jabatan.tambah')}}" class="btn btn-primary" style="float: right;">Tambah</a></h4>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Kode Jabatan </th>
                                    <th> Nama jabatan </th>
                                    <th> Besar Gaji </th>
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
        ajax: "{{route('jabatan.json')}}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'kode_jabatan',
                name: 'kode_jabatan'
            },
            {
                data: 'nama_jabatan',
                name: 'nama_jabatan'
            },
            {
                data: 'besar_gaji_rp',
                name: 'besar_gaji_rp'
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