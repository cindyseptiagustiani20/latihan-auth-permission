<?php

namespace App\Http\Controllers;
use App\Models\PotonganPegawai;
use Illuminate\Http\Request;
use DataTables;
class PotonganPegawaiController extends Controller
{
    public function index(){
        return view('potongan_pegawai.index');
    }

    public function json(Request $request) {
        if($request->ajax()) {
            $potongan_pegawai = potonganPegawai::latest()->get();

            return DataTables::of($potongan_pegawai)
            ->editColumn('action', function ($row) {
                $btn = "<a class='btn btn-warning' href='" . url('/potongan_pegawai/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/potongan_pegawai/delete') . "/" . $row->id . "'>Hapus</button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }
    public function tambah() {
        return view('potongan_pegawai.tambah');
    }

    public function insert(Request $request) {
        $post = $request->validate([
            'id_pegawai' => ['required'],
            'id_potongan' => ['required'],
            'jumlah' => ['required'],
            'total' => ['required'],

        ]); 
        if(potonganPegawai::create($post)) {
            return redirect('/potongan_pegawai')->with('sukses', 'Data Potongan Pegawai Berhasil Diubah');
        }
        else {
            return redirect('/potongan_pegawai')->with('gagal', 'Data Potongan Pegawai Gagal Diubah');
        }
    }

    public function edit($id) {
        $potongan_pegawai = potonganPegawai::find($id);
        return view('potongan_pegawai.edit', ['potongan_pegawai' => $potongan_pegawai]);
    }

    public function update(Request $request) {
        $post = $request->validate([
            'id_pegawai' => ['required'],
            'id_potongan' => ['required'],
            'jumlah' => ['required'],
            'total' => ['required'],

        ]);

        $potongan_pegawai = potonganPegawai::find($request->id);
        if($potongan_pegawai->update($post)) {
            return redirect('/potongan_pegawai')->with('sukses', 'Data Potongan Pegawai Berhasil Diubah');
        }
        else {
            return redirect('/potongan_pegawai')->with('gagal', 'Data Potongan Pegawai Gagal Diubah');
        }
    }

    public function delete($id) {
        $potongan_pegawai = potonganPegawai::find($id);
        if($potongan_pegawai->delete()) {
            return redirect('/potongan_pegawai')->with('sukses', 'Data Potongan Pegawai Berhasil Dihapus');
        }
        else {
            return redirect('/potongan_pegawai')->with('gagal', 'Data Potongan_Pegawai Gagal Dihapus');
        }
    }

}
