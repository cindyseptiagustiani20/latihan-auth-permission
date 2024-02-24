@extends('layouts.master')
@section('title', 'Data PKP')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title pb-4">Data PTKP <a href="{{route('PKP.tambah')}}" class="btn btn-primary" style="float: right;">Tambah</a></h4>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Kode PKP </th>
                                    <th> Range </th>
                                    <th> Persen </th>
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
        ajax: "{{route('PKP.json')}}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'kode_pkp',
                name: 'kode_pkp'
            },
            {
                data: 'range',
                name: 'range'
            },
            {
                data: 'persen',
                name: 'persen'
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