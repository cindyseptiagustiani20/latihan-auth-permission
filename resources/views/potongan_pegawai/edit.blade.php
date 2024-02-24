@extends('layouts.master')
@section('title', 'Edit Data Potongan Pegawai')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Potongan Pegawai</h4>
                    <form action="{{route('potongan_pegawai.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$potongan_pegawai->id}}" required>
                        <div class="form-group">
                            <label for="exampleInputpotonganname1">Nama Pegawai</label>
                            <input required type="text" class="form-control" id="exampleInputpotonganname1" placeholder="Nama Pegawai" name="id_pegawai" value="{{$potongan_pegawai->id_pegawai}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Potongan</label>
                            <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Potongan" name="id_potongan" value="{{$potongan_pegawai->id_potongan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Status" name="jumlah" value="{{$potongan_pegawai->jumlah}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Agama" name="total" value="{{$potongan_pegawai->total}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('potongan_pegawai')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection