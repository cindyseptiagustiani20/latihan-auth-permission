@extends('layouts.master')
@section('title', 'PPH21 Pegawai')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title pb-4">Data Pegawai <a href="{{route('pegawai.print_pph21', $pegawai->id)}}" target="_blank" class="btn btn-info" style="float: right;">Print PPH 21</a></h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Nama Pegawai</td>
                                <td>{{$pegawai->nama_pegawai}}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>{{$pegawai->jabatan->nama_jabatan}} - Rp. {{number_format($pegawai->jabatan->besar_gaji, 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td>PTKP</td>
                                <td>{{$pegawai->ptkp->nama_ptkp}} - Rp. {{number_format($pegawai->ptkp->jumlah, 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td>NPWP</td>
                                <td>{{$pegawai->npwp}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{$pegawai->status}}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>{{$pegawai->agama}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{$pegawai->alamat}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title pb-4">PPH 21</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Gaji/Bulan</td>
                                <td>Rp. {{number_format($pegawai->jabatan->besar_gaji, 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Tunjangan</td>
                                <td>
                                    <table>
                                        @foreach($tunjangan_pegawai as $index=>$row)
                                        <tr>
                                            @if($row['jenis'] == 'persen')
                                            <td>{{$index+1}}. {{$row['nama_tunjangan']}} ({{$row['besar']}}) %</td>
                                            @else
                                            <td>{{$index+1}}. {{$row['nama_tunjangan']}} (Rp. {{number_format(($row['besar']), 2, ',', '.')}})</td>
                                            @endif
                                            <td>Rp. {{number_format(($row['total']), 2, ',', '.')}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Total Tunjangan</td>
                                            <td>Rp. {{number_format(($sum_tunjangan), 2, ',', '.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Gaji + Tunjangan</td>
                                <td>Rp. {{number_format(($pegawai->jabatan->besar_gaji+$sum_tunjangan), 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Potongan</td>
                                <td>
                                    <table>
                                        <tr>
                                            @if(($pegawai->jabatan->besar_gaji/100)*5 <= 500000)
                                            <td>1. Biaya Jabatan 5%</td>
                                            <td>Rp. {{number_format(($pegawai->jabatan->besar_gaji/100)*5, 2, ',', '.')}}</td>
                                            @else
                                            <td>1. Biaya Jabatan 5%</td>
                                            <td>Rp. {{number_format(500000, 2, ',', '.')}}</td>
                                            @endif
                                        </tr>
                                        @foreach($potongan_pegawai as $index=>$row)
                                        <tr>
                                            @if($row['jenis'] == 'persen')
                                            <td>{{$index+2}}. {{$row['nama_potongan']}} ({{$row['besar']}}) %</td>
                                            @else
                                            <td>{{$index+1}}. {{$row['nama_potongan']}} (Rp. {{number_format(($row['besar']), 2, ',', '.')}})</td>
                                            @endif
                                            <td>Rp. {{number_format(($row['total']), 2, ',', '.')}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Total Potongan</td>
                                            <td>Rp. {{number_format(($sum_potongan+$biaya_jabatan), 2, ',', '.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Gaji Bersih</td>
                                <td>Rp. {{number_format((($pegawai->jabatan->besar_gaji+$sum_tunjangan)-($sum_potongan+$biaya_jabatan)), 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td>Gaji Bersih 1 Tahun</td>
                                <td>Rp. {{number_format((($pegawai->jabatan->besar_gaji+$sum_tunjangan)-($sum_potongan+$biaya_jabatan))*12, 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                                <td>PPH 21</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Gaji Bersih 1 Tahun - PTKP</td>
                                            <td>Rp. {{number_format($gaji_setahun, 2, ',', '.')}} - Rp. {{number_format($pegawai->ptkp->jumlah, 2, ',', '.')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Hasil</td>
                                            <td>Rp. {{number_format($gaji_setahun-$pegawai->ptkp->jumlah, 2, ',', '.')}}</td>
                                        </tr>
                                        @if($pegawai->npwp)
                                        <tr>
                                            <td>Persen PPH 21</td>
                                            <td>{{$pph21}} %</td>
                                        </tr>
                                        <tr>
                                            <td>PPH 21 1 Tahun</td>
                                            <td>Rp. {{number_format((($gaji_setahun-$pegawai->ptkp->jumlah)/100)*$pph21, 2, ',', '.')}}</td>
                                        </tr>
                                        <tr>
                                            <td>PPH 21/Bulan</td>
                                            <td>Rp. {{number_format(((($gaji_setahun-$pegawai->ptkp->jumlah)/100)*$pph21)/12, 2, ',', '.')}}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td>Persen PPH 21 (Tidak Ada NPWP)</td>
                                            <td>{{$pph21}} % x 120 %</td>
                                        </tr>
                                        <tr>
                                            <td>PPH 21 1 Tahun</td>
                                            <td>Rp. {{number_format((((($gaji_setahun-$pegawai->ptkp->jumlah)/100)*$pph21)/100)*120, 2, ',', '.')}}</td>
                                        </tr>
                                        <tr>
                                            <td>PPH 21/Bulan</td>
                                            <td>Rp. {{number_format(((((($gaji_setahun-$pegawai->ptkp->jumlah)/100)*$pph21)/100)*120)/12, 2, ',', '.')}}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection