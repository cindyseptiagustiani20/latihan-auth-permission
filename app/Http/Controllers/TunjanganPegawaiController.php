<?php

namespace App\Http\Controllers;
use App\Models\TunjanganPegawai;
use Illuminate\Http\Request;
use DataTables;
class TunjanganPegawaiController extends Controller
{
    public function index(){
        return view('tunjangan_pegawai.index');
    }

    public function json(Request $request) {
        if($request->ajax()) {
            $tunjangan_pegawai = TunjanganPegawai::latest()->get();

            return DataTables::of($tunjangan_pegawai)
            ->editColumn('action', function ($row) {
                $btn = "<a class='btn btn-warning' href='" . url('/tunjangan_pegawai/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/tunjangan_pegawai/delete') . "/" . $row->id . "'>Hapus</button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }
    public function tambah() {
        return view('tunjangan_pegawai.tambah');
    }

    public function insert(Request $request) {
        $post = $request->validate([
            'id_pegawai' => ['required'],
            'id_tunjangan' => ['required'],
            'jumlah' => ['required'],
            'total' => ['required'],

        ]); 
        if(TunjanganPegawai::create($post)) {
            return redirect('/tunjangan_pegawai')->with('sukses', 'Data Tunjangan Pegawai Berhasil Diubah');
        }
        else {
            return redirect('/tunjangan_pegawai')->with('gagal', 'Data Tunjangan Pegawai Gagal Diubah');
        }
    }

    public function edit($id) {
        $tunjangan_pegawai = TunjanganPegawai::find($id);
        return view('tunjangan_pegawai.edit', ['tunjangan_pegawai' => $tunjangan_pegawai]);
    }

    public function update(Request $request) {
        $post = $request->validate([
            'id_pegawai' => ['required'],
            'id_tunjangan' => ['required'],
            'jumlah' => ['required'],
            'total' => ['required'],

        ]);

        $tunjangan_pegawai = TunjanganPegawai::find($request->id);
        if($tunjangan_pegawai->update($post)) {
            return redirect('/tunjangan_pegawai')->with('sukses', 'Data Tunjangan Pegawai Berhasil Diubah');
        }
        else {
            return redirect('/tunjangan_pegawai')->with('gagal', 'Data Tunjangan Pegawai Gagal Diubah');
        }
    }

    public function delete($id) {
        $tunjangan_pegawai = TunjanganPegawai::find($id);
        if($tunjangan_pegawai->delete()) {
            return redirect('/tunjangan_pegawai')->with('sukses', 'Data Tunjangan Pegawai Berhasil Dihapus');
        }
        else {
            return redirect('/tunjangan_pegawai')->with('gagal', 'Data Tunjangan Pegawai Gagal Dihapus');
        }
    }

}
