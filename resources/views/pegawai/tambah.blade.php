@extends('layouts.master')
@section('title', 'Tambah Data Pegawai')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pegawai.insert')}}" method="POST" class="forms-sample">
                        <h4 class="card-title">Tambah Data Pegawai
                            <button type="submit" class="btn btn-gradient-primary me-2" style="float: right;">Submit</button>
                            <a href="{{route('pegawai')}}" class="btn btn-light" style="float: right;">Cancel</a>
                        </h4>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPegawainame1">Nama Pegawai</label>
                            <input required type="text" class="form-control" id="exampleInputPegawainame1" placeholder="Nama Pegawai" name="nama_pegawai">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jabatan</label>
                            <select required name="id_jabatan" class="form-control">
                                @foreach($jabatan as $row)
                                <option value="{{$row->id}}">{{$row->nama_jabatan}} - {{$row->besar_gaji}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">PTKP</label>
                            <select required name="id_ptkp" class="form-control">
                                @foreach($ptkp as $row)
                                <option value="{{$row->id}}">{{$row->nama_ptkp}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NPWP</label>
                            <input required type="text" class="form-control number" id="exampleInputPassword1" placeholder="NPWP" name="npwp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Status" name="status">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Agama</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Agama" name="agama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" name="alamat">
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tunjangan Karyawan <span id="tambahTunjangan" class="btn btn-sm btn-primary" style="float: right;"><i class="mdi mdi-plus"></i></span></h4>
                            </div>
                            <div class="card-body forms-sample" id="tunjangan">
                                <div class="row inputTunjangan">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pilih Tunjangan</label>
                                            <select required class="form-control tunjangan" name="tunjangan[]">
                                                @foreach($tunjangan as $row)
                                                <option value="{{$row->id}}" data-jenis="{{$row->jenis}}" data-besar="{{$row->besar}}">{{$row->nama_tunjangan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="labelBesarTunjangan">Besar</label>
                                            <input required type="text" class="form-control number besar" id="exampleInputPassword1" placeholder="Besar" name="besar_tunjangan[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Potongan Karyawan <span id="tambahPotongan" class="btn btn-sm btn-primary" style="float: right;"><i class="mdi mdi-plus"></i></span></h4>
                            </div>
                            <div class="card-body forms-sample" id="potongan">
                                <div class="row inputPotongan">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pilih Potongan</label>
                                            <select required class="form-control potongan" name="potongan[]">
                                                @foreach($potongan as $row)
                                                <option value="{{$row->id}}" data-jenis="{{$row->jenis}}" data-besar="{{$row->besar}}">{{$row->nama_potongan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="labelBesarPotongan">Besar</label>
                                            <input required type="text" class="form-control number besar" id="exampleInputPassword1" placeholder="Besar" name="besar_potongan[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $('body').on("input keydown keyup mousedown mouseup select contextmenu drop", '.number', function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });

        $(document).ready(function() {
            $('#tambahTunjangan').on('click', function() {
                let input_tunjangan = `<div class="row inputTunjangan">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pilih Tunjangan</label>
                                            <select required class="form-control tunjangan" name="tunjangan[]">
                                                @foreach($tunjangan as $row)
                                                <option value="{{$row->id}}" data-jenis="{{$row->jenis}}" data-besar="{{$row->besar}}">{{$row->nama_tunjangan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="labelBesarTunjangan">Besar</label>
                                            <input required type="text" class="form-control number besar" id="exampleInputPassword1" placeholder="Besar" name="besar_tunjangan[]">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="btn btn-sm btn-danger removeTunjangan" style="margin-top: 30px;"><i class="mdi mdi-trash"></i> Hapus</span>
                                    </div>
                                </div>`;
                $('#tunjangan').append(input_tunjangan);
            });

            $('body').on('click', '.removeTunjangan', function() {
                $(this).closest(".inputTunjangan").remove();
            });

            $('body').on('change', '.tunjangan', function() {
                $(this).closest(".inputTunjangan").find('.labelBesarTunjangan').html('Besar ('+$(this).find(":selected").data('jenis')+')')
                $(this).closest(".inputTunjangan").find('.besar').val('');

                if ($(this).find(":selected").data('besar')) {
                    $(this).closest(".inputTunjangan").find('.besar').val($(this).find(":selected").data('besar'));
                    $(this).closest(".inputTunjangan").find('.besar').attr('readonly', true);
                }
                else {
                    $(this).closest(".inputTunjangan").find('.besar').removeAttr('readonly');
                }
            });

            $('#tambahPotongan').on('click', function() {
                let input_potongan = `<div class="row inputPotongan">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pilih Potongan</label>
                                            <select required class="form-control potongan" name="potongan[]">
                                                @foreach($potongan as $row)
                                                <option value="{{$row->id}}" data-jenis="{{$row->jenis}}" data-besar="{{$row->besar}}">{{$row->nama_potongan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="labelBesarPotongan">Besar</label>
                                            <input required type="text" class="form-control number besar" id="exampleInputPassword1" placeholder="Besar" name="besar_potongan[]">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="btn btn-sm btn-danger removePotongan" style="margin-top: 30px;"><i class="mdi mdi-trash"></i> Hapus</span>
                                    </div>
                                </div>`;
                $('#potongan').append(input_potongan);
            });

            $('body').on('click', '.removePotongan', function() {
                $(this).closest(".inputPotongan").remove();
            });

            $('body').on('change', '.potongan', function() {
                $(this).closest(".inputPotongan").find('.labelBesarPotongan').html('Besar ('+$(this).find(":selected").data('jenis')+')')
                $(this).closest(".inputPotongan").find('.besar').val('');

                if ($(this).find(":selected").data('besar')) {
                    $(this).closest(".inputPotongan").find('.besar').val($(this).find(":selected").data('besar'));
                    $(this).closest(".inputPotongan").find('.besar').attr('readonly', true);
                }
                else {
                    $(this).closest(".inputPotongan").find('.besar').removeAttr('readonly');
                }
            });
        });
    </script>
    @endsection