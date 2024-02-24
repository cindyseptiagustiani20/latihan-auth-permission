<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\PTKP;
use App\Models\PKP;
use App\Models\Tunjangan;
use App\Models\Potongan;
use App\Models\TunjanganPegawai;
use App\Models\PotonganPegawai;
use Illuminate\Http\Request;
use DataTables;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
    }

    public function json(Request $request)
    {
        if ($request->ajax()) {
            $pegawai = Pegawai::with('jabatan', 'ptkp')->latest()->get();

            return DataTables::of($pegawai)

                // ->addColumn('ptkp', function ($row) {
                //     return "Rp. " . number_format($row->harga, 2, ',', '.');
                // })
                ->addColumn('jabatan', function ($row) {
                    return $row->jabatan->nama_jabatan;
                })
                ->addColumn('ptkp', function ($row) {
                    return $row->ptkp->nama_ptkp;
                })
                ->editColumn('action', function ($row) {
                    $btn = "<a class='btn btn-sm btn-info' href='" . url('/pegawai/pph21') . "/" . $row->id . "'>PPH21</a>";
                    if (auth()->user()->role == 'accounting') {
                        $btn .= " <a class='btn btn-sm btn-warning' href='" . url('/pegawai/edit') . "/" . $row->id . "'>Edit</a>";
                        $btn .= "<button class='btn btn-sm btn-danger deleteButton' data-url='" . url('/pegawai/delete') . "/" . $row->id . "'>Hapus</button>";
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function tambah()
    {
        $tunjangan = Tunjangan::all();
        $potongan = Potongan::all();
        $ptkp = PTKP::all();
        $jabatan = Jabatan::all();
        return view('pegawai.tambah', ['tunjangan' => $tunjangan, 'potongan' => $potongan, 'ptkp' => $ptkp, 'jabatan' => $jabatan]);
    }

    public function insert(Request $request)
    {
        $post = $request->validate([
            'nama_pegawai' => ['required'],
            'id_jabatan' => ['required'],
            'id_ptkp' => ['required'],
            'status' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
            'npwp' => ['required']
        ]);
        if ($pegawai = pegawai::create($post)) {
            // TunjanganPegawai::where('id_pegawai', $pegawai->id)->delete();
            foreach ($request->tunjangan as $index => $tunjangan) {
                $checkTunjangan = TunjanganPegawai::where('id_tunjangan', $tunjangan)->where('id_pegawai', $pegawai->id)->get()->count();
                if ($checkTunjangan > 0) {
                } else {
                    $getJabatan = Jabatan::find($request->id_jabatan);
                    $tunjanganData = Tunjangan::find($tunjangan);
                    $total = 0;
                    if ($tunjanganData) {
                        if ($tunjanganData->jenis == 'persen') {
                            $total = ($getJabatan->besar_gaji / 100) * $request->besar_tunjangan[$index];
                        } else {
                            $total = $request->besar_tunjangan[$index];
                        }
                    }
                    TunjanganPegawai::create([
                        'id_pegawai' => $pegawai->id,
                        'id_tunjangan' => $tunjangan,
                        'jumlah' => $request->besar_tunjangan[$index],
                        'total' => $total
                    ]);
                }
            }

            foreach ($request->potongan as $index => $potongan) {
                $checkPotongan = PotonganPegawai::where('id_potongan', $potongan)->where('id_pegawai', $pegawai->id)->get()->count();
                if ($checkPotongan > 0) {
                } else {

                    $getJabatan = Jabatan::find($request->id_jabatan);
                    $potonganData = Potongan::find($potongan);
                    $total = 0;
                    if ($potonganData) {
                        if ($potonganData->jenis == 'persen') {
                            $total = ($getJabatan->besar_gaji / 100) * $request->besar_potongan[$index];
                        } else {
                            $total = $request->besar_potongan[$index];
                        }
                    }
                    PotonganPegawai::create([
                        'id_pegawai' => $pegawai->id,
                        'id_potongan' => $potongan,
                        'jumlah' => $request->besar_potongan[$index],
                        'total' => $total
                    ]);
                }
            }

            return redirect('/pegawai')->with('sukses', 'Data pegawai Berhasil Ditambah');
        } else {
            return redirect('/pegawai')->with('gagal', 'Data pegawai Gagal Ditambah');
        }
    }

    public function edit($id)
    {
        $pegawai = pegawai::find($id);
        $tunjangan = Tunjangan::all();
        $potongan = Potongan::all();
        $ptkp = PTKP::all();
        $jabatan = Jabatan::all();
        $tunjangan_pegawai = TunjanganPegawai::with('tunjangan')->where('id_pegawai', $id)->get();
        $potongan_pegawai = PotonganPegawai::with('potongan')->where('id_pegawai', $id)->get();

        return view('pegawai.edit', ['pegawai' => $pegawai, 'tunjangan' => $tunjangan, 'potongan' => $potongan, 'ptkp' => $ptkp, 'jabatan' => $jabatan, 'tunjangan_pegawai' => $tunjangan_pegawai, 'potongan_pegawai' => $potongan_pegawai]);
    }

    public function update(Request $request)
    {
        $post = $request->validate([
            'nama_pegawai' => ['required'],
            'id_jabatan' => ['required'],
            'id_ptkp' => ['required'],
            'status' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
            'npwp' => ['required']
        ]);
        if ($pegawai = pegawai::find($request->id)->update($post)) {
            TunjanganPegawai::where('id_pegawai', $request->id)->delete();
            PotonganPegawai::where('id_pegawai', $request->id)->delete();

            foreach ($request->tunjangan as $index => $tunjangan) {
                $checkTunjangan = TunjanganPegawai::where('id_tunjangan', $tunjangan)->where('id_pegawai', $request->id)->get()->count();
                if ($checkTunjangan > 0) {
                } else {
                    $getJabatan = Jabatan::find($request->id_jabatan);
                    $tunjanganData = Tunjangan::find($tunjangan);
                    $total = 0;
                    if ($tunjanganData) {
                        if ($tunjanganData->jenis == 'persen') {
                            $total = ($getJabatan->besar_gaji / 100) * $request->besar_tunjangan[$index];
                        } else {
                            $total = $request->besar_tunjangan[$index];
                        }
                    }
                    TunjanganPegawai::create([
                        'id_pegawai' => $request->id,
                        'id_tunjangan' => $tunjangan,
                        'jumlah' => $request->besar_tunjangan[$index],
                        'total' => $total
                    ]);
                }
            }

            foreach ($request->potongan as $index => $potongan) {
                $checkPotongan = PotonganPegawai::where('id_potongan', $potongan)->where('id_pegawai', $request->id)->get()->count();
                if ($checkPotongan > 0) {
                } else {

                    $getJabatan = Jabatan::find($request->id_jabatan);
                    $potonganData = Potongan::find($potongan);
                    $total = 0;
                    if ($potonganData) {
                        if ($potonganData->jenis == 'persen') {
                            $total = ($getJabatan->besar_gaji / 100) * $request->besar_potongan[$index];
                        } else {
                            $total = $request->besar_potongan[$index];
                        }
                    }
                    PotonganPegawai::create([
                        'id_pegawai' => $request->id,
                        'id_potongan' => $potongan,
                        'jumlah' => $request->besar_potongan[$index],
                        'total' => $total
                    ]);
                }
            }

            return redirect('/pegawai')->with('sukses', 'Data pegawai Berhasil Diubah');
        } else {
            return redirect('/pegawai')->with('gagal', 'Data pegawai Gagal Diubah');
        }
    }

    public function delete($id)
    {
        $pegawai = pegawai::find($id);
        TunjanganPegawai::where('id_pegawai', $id)->delete();
        PotonganPegawai::where('id_pegawai', $id)->delete();
        if ($pegawai->delete()) {
            return redirect('/pegawai')->with('sukses', 'Data pegawai Berhasil Dihapus');
        } else {
            return redirect('/pegawai')->with('gagal', 'Data pegawai Gagal Dihapus');
        }
    }

    public function pph21($id)
    {
        $pegawai = pegawai::with('ptkp', 'jabatan')->find($id);
        $tunjangan_pegawai = TunjanganPegawai::with('tunjangan')->where('id_pegawai', $id)->get();
        // $sum_tunjangan_pegawai = TunjanganPegawai::where('id_pegawai', $id)->sum('total');
        $sum_tunjangan_pegawai = 0;
        $potongan_pegawai = PotonganPegawai::with('potongan')->where('id_pegawai', $id)->get();
        // $sum_potongan_pegawai = PotonganPegawai::where('id_pegawai', $id)->sum('total');
        $sum_potongan_pegawai = 0;

        $data_tunjangan = [];
        foreach ($tunjangan_pegawai as $tunjangan) {
            $total_tunjangan = 0;
            if ($tunjangan->tunjangan->jenis == 'persen') {
                $total_tunjangan = ($pegawai->jabatan->besar_gaji / 100) * $tunjangan->tunjangan->besar;
            } else {
                $total_tunjangan = $tunjangan->tunjangan->besar;
            }
            $data_tunjangan[] = [
                'nama_tunjangan' => $tunjangan->tunjangan->nama_tunjangan,
                'jenis' => $tunjangan->tunjangan->jenis,
                'besar' => $tunjangan->tunjangan->besar,
                'total' => $total_tunjangan
            ];
            $sum_tunjangan_pegawai += $total_tunjangan;
        }

        $data_potongan = [];
        foreach ($potongan_pegawai as $potongan) {
            $total_potongan = 0;
            if ($potongan->potongan->jenis == 'persen') {
                $total_potongan = ($pegawai->jabatan->besar_gaji / 100) * $potongan->potongan->besar;
            } else {
                $total_potongan = $potongan->potongan->besar;
            }
            $data_potongan[] = [
                'nama_potongan' => $potongan->potongan->nama_potongan,
                'jenis' => $potongan->potongan->jenis,
                'besar' => $potongan->potongan->besar,
                'total' => $total_potongan
            ];
            $sum_potongan_pegawai += $total_potongan;
        }

        $biaya_jabatan = 0;
        if (($pegawai->jabatan->besar_gaji / 100) * 5 <= 500000) {
            $biaya_jabatan = ($pegawai->jabatan->besar_gaji / 100) * 5;
        } else {
            $biaya_jabatan = 500000;
        }

        $gaji_bersih = ($pegawai->jabatan->besar_gaji + $sum_tunjangan_pegawai) - ($sum_potongan_pegawai + $biaya_jabatan);

        $gaji_bersih_setahun = $gaji_bersih * 12;

        $data_pkp = PKP::orderBy('min', 'DESC')->get();
        $pph21 = 0;

        $hasil = $gaji_bersih_setahun - $pegawai->ptkp->jumlah;
        if ($hasil > 0) {

            foreach ($data_pkp as $pkp) {
                if ($hasil >= $pkp->min) {
                    $pph21 = $pkp->persen;
                    break;
                }
            }
        }

        return view('pegawai.pph21', ['pegawai' => $pegawai, 'tunjangan_pegawai' => $data_tunjangan, 'potongan_pegawai' => $data_potongan, 'sum_tunjangan' => $sum_tunjangan_pegawai, 'sum_potongan' => $sum_potongan_pegawai, 'pph21' => $pph21, 'hasil' => $hasil, 'gaji_setahun' => $gaji_bersih_setahun, 'biaya_jabatan' => $biaya_jabatan]);
    }

    public function print_pph21($id)
    {
        $pegawai = pegawai::with('ptkp', 'jabatan')->find($id);
        $tunjangan_pegawai = TunjanganPegawai::with('tunjangan')->where('id_pegawai', $id)->get();
        // $sum_tunjangan_pegawai = TunjanganPegawai::where('id_pegawai', $id)->sum('total');
        $sum_tunjangan_pegawai = 0;
        $potongan_pegawai = PotonganPegawai::with('potongan')->where('id_pegawai', $id)->get();
        // $sum_potongan_pegawai = PotonganPegawai::where('id_pegawai', $id)->sum('total');
        $sum_potongan_pegawai = 0;

        $data_tunjangan = [];
        foreach ($tunjangan_pegawai as $tunjangan) {
            $total_tunjangan = 0;
            if ($tunjangan->tunjangan->jenis == 'persen') {
                $total_tunjangan = ($pegawai->jabatan->besar_gaji / 100) * $tunjangan->tunjangan->besar;
            } else {
                $total_tunjangan = $tunjangan->tunjangan->besar;
            }
            $data_tunjangan[] = [
                'nama_tunjangan' => $tunjangan->tunjangan->nama_tunjangan,
                'jenis' => $tunjangan->tunjangan->jenis,
                'besar' => $tunjangan->tunjangan->besar,
                'total' => $total_tunjangan
            ];
            $sum_tunjangan_pegawai += $total_tunjangan;
        }

        $data_potongan = [];
        foreach ($potongan_pegawai as $potongan) {
            $total_potongan = 0;
            if ($potongan->potongan->jenis == 'persen') {
                $total_potongan = ($pegawai->jabatan->besar_gaji / 100) * $potongan->potongan->besar;
            } else {
                $total_potongan = $potongan->potongan->besar;
            }
            $data_potongan[] = [
                'nama_potongan' => $potongan->potongan->nama_potongan,
                'jenis' => $potongan->potongan->jenis,
                'besar' => $potongan->potongan->besar,
                'total' => $total_potongan
            ];
            $sum_potongan_pegawai += $total_potongan;
        }

        $biaya_jabatan = 0;
        if (($pegawai->jabatan->besar_gaji / 100) * 5 <= 500000) {
            $biaya_jabatan = ($pegawai->jabatan->besar_gaji / 100) * 5;
        } else {
            $biaya_jabatan = 500000;
        }

        $gaji_bersih = ($pegawai->jabatan->besar_gaji + $sum_tunjangan_pegawai) - ($sum_potongan_pegawai + $biaya_jabatan);

        $gaji_bersih_setahun = $gaji_bersih * 12;

        $data_pkp = PKP::orderBy('min', 'DESC')->get();
        $pph21 = 0;

        $hasil = $gaji_bersih_setahun - $pegawai->ptkp->jumlah;
        if ($hasil > 0) {

            foreach ($data_pkp as $pkp) {
                if ($hasil >= $pkp->min) {
                    $pph21 = $pkp->persen;
                    break;
                }
            }
        }

        return view('pegawai.print_pph21', ['pegawai' => $pegawai, 'tunjangan_pegawai' => $data_tunjangan, 'potongan_pegawai' => $data_potongan, 'sum_tunjangan' => $sum_tunjangan_pegawai, 'sum_potongan' => $sum_potongan_pegawai, 'pph21' => $pph21, 'hasil' => $hasil, 'gaji_setahun' => $gaji_bersih_setahun, 'biaya_jabatan' => $biaya_jabatan]);
    }
}
