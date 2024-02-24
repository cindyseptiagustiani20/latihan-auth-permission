<?php

namespace App\Http\Controllers;
use App\Models\PKP;
use Illuminate\Http\Request;
use DataTables;

class PKPController extends Controller
{
    public function index(){
        return view('PKP.index');
    }

    public function json(Request $request) {
        if($request->ajax()) {
            $PKP = PKP::latest()->get();

            return DataTables::of($PKP)
            ->addColumn('kode_pkp', function ($row) {
                return "PKP-" . $row->id;
            })
            ->addColumn('range', function ($row) {
                return "Rp. " . number_format($row->min, 2, ',', '.').' - '."Rp. " . number_format($row->max, 2, ',', '.');
            })
            ->editColumn('action', function ($row) {
                $btn = "<a class='btn btn-warning' href='" . url('/PKP/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/PKP/delete') . "/" . $row->id . "'>Hapus</button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }
    public function tambah() {
        return view('PKP.tambah');
    }

    public function insert(Request $request) {
        $post = $request->validate([
            'min' => ['required'],
            'max' => ['required'],
            'persen' => ['required']
        ]); 
        if(PKP::create($post)) {
            return redirect('/PKP')->with('sukses', 'Data PKP Berhasil Diubah');
        }
        else {
            return redirect('/PKP')->with('gagal', 'Data PKP Gagal Diubah');
        }
    }

    public function edit($id) {
        $PKP = PKP::find($id);
        return view('PKP.edit', ['PKP' => $PKP]);
    }

    public function update(Request $request) {
        $post = $request->validate([
            'min' => ['required'],
            'max' => ['required'],
            'persen' => ['required']
        ]);

        $PKP = PKP::find($request->id);
        if($PKP->update($post)) {
            return redirect('/PKP')->with('sukses', 'Data PKP Berhasil Diubah');
        }
        else {
            return redirect('/PKP')->with('gagal', 'Data PKP Gagal Diubah');
        }
    }

    public function delete($id) {
        $PKP = PKP::find($id);
        if($PKP->delete()) {
            return redirect('/PKP')->with('sukses', 'Data PKP Berhasil Dihapus');
        }
        else {
            return redirect('/PKP')->with('gagal', 'Data PKP Gagal Dihapus');
        }
    }
}
