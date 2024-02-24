@extends('layouts.master')
@section('title', 'Edit Data PTKP')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data PTKP</h4>
                    <form action="{{route('PTKP.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$PTKP->id}}" required>
                        <div class="form-group">
                            <label for="exampleInputjabatanname1">Nama PTKP</label>
                            <input required type="text" class="form-control" id="exampleInputjabatanname1" placeholder="Persen" name="nama_ptkp" value="{{$PTKP->nama_ptkp}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Jumlah" name="jumlah" value="{{$PTKP->jumlah}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('PTKP')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection