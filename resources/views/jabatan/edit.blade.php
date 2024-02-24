@extends('layouts.master')
@section('title', 'Edit Data Jabatan')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Jabatan</h4>
                    <form action="{{route('jabatan.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$jabatan->id}}" required>
                        <div class="form-group">
                            <label for="exampleInputjabatanname1">Nama jabatan</label>
                            <select name="nama_jabatan" id="" class="form-control" required>
                                <option value="HRD" @if($jabatan->nama_jabatan == 'HRD') selected @endif>HRD</option>
                                <option value="Accounting" @if($jabatan->nama_jabatan == 'Accounting') selected @endif>Accounting</option>
                                <option value="Manager Produksi" @if($jabatan->nama_jabatan == 'Manager Produksi') selected @endif>Manager Produksi</option>
                                <option value="Manager Sales" @if($jabatan->nama_jabatan == 'Manager Sales') selected @endif>Manager Sales</option>
                                <option value="QC" @if($jabatan->nama_jabatan == 'QC') selected @endif>QC</option>
                                <option value="Staf/Karyawan" @if($jabatan->nama_jabatan == 'Staf/Karyawan') selected @endif>Staf/Karyawan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Besar Gaji</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Besar Gaji" name="besar_gaji" value="{{$jabatan->besar_gaji}}">
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