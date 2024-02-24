@extends('layouts.master')
@section('title', 'Edit Data Tunjangan')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Tunjangan</h4>
                    <form action="{{route('tunjangan.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$tunjangan->id}}" required>
                        <div class="form-group">
                            <label for="exampleInputTunjanganname1">Nama Tunjangan</label>
                            <input required type="text" class="form-control" id="exampleInputTunjanganname1" placeholder="Nama Tunjangan" name="nama_tunjangan" value="{{$tunjangan->nama_tunjangan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Jenis" name="jenis" value="{{$tunjangan->jenis}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Besar Tunjangan</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Besar Tunjangan" name="besar" value="{{$tunjangan->besar}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('tunjangan')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection