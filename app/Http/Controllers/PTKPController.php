<?php

namespace App\Http\Controllers;
use App\Models\PTKP;
use Illuminate\Http\Request;
use DataTables;
class PTKPController extends Controller
{
    public function index(){
        return view('PTKP.index');
    }

    public function json(Request $request) {
        if($request->ajax()) {
            $PTKP = PTKP::latest()->get();

            return DataTables::of($PTKP)
            ->addColumn('kode_ptkp', function ($row) {
                return "PTKP-" . $row->id;
            })
            ->editColumn('action', function ($row) {
                $btn = "<a class='btn btn-warning' href='" . url('/PTKP/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/PTKP/delete') . "/" . $row->id . "'>Hapus</button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }
    public function tambah() {
        return view('PTKP.tambah');
    }

    public function insert(Request $request) {
        $post = $request->validate([
            'nama_ptkp' => ['required'],
            'jumlah' => ['required']
        ]); 
        if(PTKP::create($post)) {
            return redirect('/PTKP')->with('sukses', 'Data PTKP Berhasil Diubah');
        }
        else {
            return redirect('/PTKP')->with('gagal', 'Data PTKP Gagal Diubah');
        }
    }

    public function edit($id) {
        $PTKP = PTKP::find($id);
        return view('PTKP.edit', ['PTKP' => $PTKP]);
    }

    public function update(Request $request) {
        $post = $request->validate([
            'nama_ptkp' => ['required'],
            'jumlah' => ['required']
        ]);

        $PTKP = PTKP::find($request->id);
        if($PTKP->update($post)) {
            return redirect('/PTKP')->with('sukses', 'Data PTKP Berhasil Diubah');
        }
        else {
            return redirect('/PTKP')->with('gagal', 'Data PTKP Gagal Diubah');
        }
    }

    public function delete($id) {
        $PTKP = PTKP::find($id);
        if($PTKP->delete()) {
            return redirect('/PTKP')->with('sukses', 'Data PTKP Berhasil Dihapus');
        }
        else {
            return redirect('/PTKP')->with('gagal', 'Data PTKP Gagal Dihapus');
        }
    }
}
