<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\Golongan;
use DataTables;

class JabatanController extends Controller
{
    public function index(){
        return view('jabatan.index');
    }

    public function json(Request $request) {
        if($request->ajax()) {
            $jabatan = jabatan::latest()->get();

            return DataTables::of($jabatan)
            ->addColumn('kode_jabatan', function ($row) {
                return "JB-" . $row->id;
            })
            ->addColumn('besar_gaji_rp', function ($row) {
                    return "Rp. " . number_format($row->besar_gaji, 2, ',', '.');
                })
            ->editColumn('action', function ($row) {
                $btn = "<a class='btn btn-warning' href='" . url('/jabatan/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/jabatan/delete') . "/" . $row->id . "'>Hapus</button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }
    public function tambah() {
        return view('jabatan.tambah');
    }

    public function insert(Request $request) {
        $post = $request->validate([
            'nama_jabatan' => ['required'],
            'besar_gaji' => ['required']
        ]); 
        if(jabatan::create($post)) {
            return redirect('/jabatan')->with('sukses', 'Data Jabatan Berhasil Diubah');
        }
        else {
            return redirect('/jabatan')->with('gagal', 'Data Jabatan Gagal Diubah');
        }
    }

    public function edit($id) {
        $jabatan = jabatan::find($id);
        return view('jabatan.edit', ['jabatan' => $jabatan]);
    }

    public function update(Request $request) {
        $post = $request->validate([
            'nama_jabatan' => ['required'],
            'besar_gaji' => ['required']
        ]);

        $jabatan = jabatan::find($request->id);
        if($jabatan->update($post)) {
            return redirect('/jabatan')->with('sukses', 'Data Jabatan Berhasil Diubah');
        }
        else {
            return redirect('/jabatan')->with('gagal', 'Data Jabatan Gagal Diubah');
        }
    }

    public function delete($id) {
        $jabatan = jabatan::find($id);
        if($jabatan->delete()) {
            return redirect('/jabatan')->with('sukses', 'Data Jabatan Berhasil Dihapus');
        }
        else {
            return redirect('/jabatan')->with('gagal', 'Data Jabatan Gagal Dihapus');
        }
    }
}
