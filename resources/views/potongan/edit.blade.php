@extends('layouts.master')
@section('title', 'Edit Data Potongan')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Data Potongan
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Potongan</h4>
                    <form action="{{route('potongan.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$potongan->id}}" required>
                        <div class="form-group">
                            <label for="exampleInputPotonganname1">Nama Potongan</label>
                            <input required type="text" class="form-control" id="exampleInputPotonganname1" placeholder="Nama Potongan" name="nama_potongan" value="{{$potongan->nama_potongan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Jenis" name="jenis" value="{{$potongan->jenis}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Besar Potongan</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Besar Potongan" name="besar" value="{{$potongan->besar}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('potongan')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection