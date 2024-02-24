<?php

namespace App\Http\Controllers;

use App\Models\Tunjangan;
use Illuminate\Http\Request;
use DataTables;

class TunjanganController extends Controller
{
    public function index()
    {
        return view('Tunjangan.index');
    }

    public function json(Request $request)
    {
        if ($request->ajax()) {
            $tunjangan = Tunjangan::latest()->get();

            return DataTables::of($tunjangan)
                ->addColumn('kode_tunjangan', function ($row) {
                    return "T-" . $row->id;
                })
                ->editColumn('action', function ($row) {
                    $btn = "<a class='btn btn-warning' href='" . url('/tunjangan/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/tunjangan/delete') . "/" . $row->id . "'>Hapus</button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function tambah()
    {
        return view('tunjangan.tambah');
    }

    public function insert(Request $request)
    {
        if ($request->jenis === 'persen') {
            $post = $request->validate([
                'nama_tunjangan' => ['required'],
                'jenis' => ['required'],
                'besar' => ['required']

            ]);
            if (Tunjangan::create($post)) {
                return redirect('/tunjangan')->with('sukses', 'Data Tunjangan Berhasil Ditambah');
            } else {
                return redirect('/tunjangan')->with('gagal', 'Data Tunjangan Gagal Ditambah');
            }
        } else {
            $post = $request->validate([
                'nama_tunjangan' => ['required'],
                'jenis' => ['required']

            ]);
            $post['besar'] = $request->besar;
            if (Tunjangan::create($post)) {
                return redirect('/tunjangan')->with('sukses', 'Data Tunjangan Berhasil Ditambah');
            } else {
                return redirect('/tunjangan')->with('gagal', 'Data Tunjangan Gagal Ditambah');
            }
        }
    }

    public function edit($id)
    {
        $tunjangan = Tunjangan::find($id);
        return view('tunjangan.edit', ['tunjangan' => $tunjangan]);
    }

    public function update(Request $request)
    {
        if ($request->jenis === 'persen') {
            $post = $request->validate([
                'nama_tunjangan' => ['required'],
                'jenis' => ['required'],
                'besar' => ['required']
            ]);

            $tunjangan = Tunjangan::find($request->id);
            if ($tunjangan->update($post)) {
                return redirect('/tunjangan')->with('sukses', 'Data Tunjangan Berhasil Diubah');
            } else {
                return redirect('/tunjangan')->with('gagal', 'Data Tunjangan Gagal Diubah');
            }
        } else {
            $post = $request->validate([
                'nama_tunjangan' => ['required'],
                'jenis' => ['required']

            ]);
            $post['besar'] = $request->besar;
            $tunjangan = Tunjangan::find($request->id);
            if ($tunjangan->update($post)) {
                return redirect('/tunjangan')->with('sukses', 'Data Tunjangan Berhasil Diubah');
            } else {
                return redirect('/tunjangan')->with('gagal', 'Data Tunjangan Gagal Diubah');
            }
        }
    }

    public function delete($id)
    {
        $tunjangan = Tunjangan::find($id);
        if ($tunjangan->delete()) {
            return redirect('/tunjangan')->with('sukses', 'Data Tunjangan Berhasil Dihapus');
        } else {
            return redirect('/tunjangan')->with('gagal', 'Data Tunjangan Gagal Dihapus');
        }
    }
}
