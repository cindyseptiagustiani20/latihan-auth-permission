@extends('layouts.master')
@section('title', 'Tambah Data Jabatan')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Jabatan</h4>
                    <form action="{{route('jabatan.insert')}}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputjabatanname1">Nama jabatan</label>
                            <select name="nama_jabatan" id="" class="form-control" required>
                                <option value="HRD">HRD</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Manager Produksi">Manager Produksi</option>
                                <option value="Manager Sales">Manager Sales</option>
                                <option value="QC">QC</option>
                                <option value="Staf/Karyawan">Staf/Karyawan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Besar Gaji</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Besar Gaji" name="besar_gaji">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('jabatan')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection