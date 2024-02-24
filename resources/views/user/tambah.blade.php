@extends('layouts.master')
@section('title', 'Tambah Data User')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data User</h4>
                    <form action="{{route('user.insert')}}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama User</label>
                            <input required type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama User" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hak Akses</label>
                            <select name="role" id="" class="form-control">
                                <option value="superadmin">Superadmin</option>
                                <option value="accounting">Accounting</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('user')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    @endsection