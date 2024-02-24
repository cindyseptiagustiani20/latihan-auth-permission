@extends('layouts.master')
@section('title', 'Edit Data Tunjangan Pegawai')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Tunjangan Pegawai</h4>
                    <form action="{{route('tunjangan_pegawai.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$tunjangan_pegawai->id}}" required>
                        <div class="form-group">
                            <label for="exampleInputTunjanganname1">Nama Pegawai</label>
                            <input required type="text" class="form-control" id="exampleInputTunjanganname1" placeholder="Nama Pegawai" name="id_pegawai" value="{{$tunjangan_pegawai->id_pegawai}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tunjangan</label>
                            <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Tunjangan" name="id_tunjangan" value="{{$tunjangan_pegawai->id_tunjangan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Status" name="jumlah" value="{{$tunjangan_pegawai->jumlah}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Agama" name="total" value="{{$tunjangan_pegawai->total}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('tunjangan_pegawai')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection