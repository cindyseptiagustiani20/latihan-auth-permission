<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tunjangan;
use App\Models\Potongan;
use App\Models\Jabatan;
use App\Models\PTKP;
use App\Models\PKP;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index() {
        $tunjangan = Tunjangan::all()->count();
        $potongan = Potongan::all()->count();
        $jabatan = Jabatan::all()->count();
        $ptkp = PTKP::all()->count();
        $pkp = PKP::all()->count();
        $pegawai = Pegawai::all()->count();

        return view('dashboard.index', ['tunjangan' => $tunjangan, 'potongan' => $potongan, 'jabatan' => $jabatan, 'ptkp' => $ptkp, 'pkp' => $pkp, 'pegawai' => $pegawai]);
    }
}
