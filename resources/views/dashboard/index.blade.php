@extends('layouts.master')
@section('title', 'Dashboard')
@section('style')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Tunjangan</h4>
                    <div class="media">
                        <i class="ti-tag icon-md text-info d-flex align-self-start me-3"></i>
                        <div class="media-body">
                            <h4>{{$tunjangan}}</h4>
                            <p class="card-text">Jumlah tunjangan yang terdaftar dalam aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Potongan</h4>
                    <div class="media">
                        <i class="ti-image icon-md text-info d-flex align-self-center me-3"></i>
                        <div class="media-body">
                            <h4>{{$potongan}}</h4>
                            <p class="card-text">Jumlah potongan yang terdaftar dalam aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Jabatan</h4>
                    <div class="media">
                        <i class="ti-user icon-md text-info d-flex align-self-end me-3"></i>
                        <div class="media-body">
                            <h4>{{$jabatan}}</h4>
                            <p class="card-text">Jumlah jabatan yang terdaftar dalam aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data PKP</h4>
                    <div class="media">
                        <i class="ti-money icon-md text-info d-flex align-self-start me-3"></i>
                        <div class="media-body">
                            <h4>{{$pkp}}</h4>
                            <p class="card-text">Jumlah PKP yang terdaftar dalam aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data PTKP</h4>
                    <div class="media">
                        <i class="ti-money icon-md text-info d-flex align-self-center me-3"></i>
                        <div class="media-body">
                            <h4>{{$ptkp}}</h4>
                            <p class="card-text">Jumlah PTKP yang terdaftar dalam aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pegawai</h4>
                    <div class="media">
                        <i class=" mdi mdi-account-multiple icon-md text-info d-flex align-self-end me-3"></i>
                        <div class="media-body">
                            <h4>{{$pegawai}}</h4>
                            <p class="card-text">Jumlah pegawai yang terdaftar dalam aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')

@endsection