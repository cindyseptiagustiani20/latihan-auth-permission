<?php

namespace App\Http\Controllers;

use App\Models\Potongan;
use Illuminate\Http\Request;
use DataTables;

class PotonganController extends Controller
{
    public function index()
    {
        return view('potongan.index');
    }

    public function json(Request $request)
    {
        if ($request->ajax()) {
            $potongan = potongan::latest()->get();

            return DataTables::of($potongan)
            ->addColumn('kode_potongan', function ($row) {
                return "P-" . $row->id;
            })
                ->editColumn('action', function ($row) {
                    $btn = "<a class='btn btn-warning' href='" . url('/potongan/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/potongan/delete') . "/" . $row->id . "'>Hapus</button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function tambah()
    {
        return view('potongan.tambah');
    }

    public function insert(Request $request)
    {
        if ($request->jenis == 'persen') {
            $post = $request->validate([
                'nama_potongan' => ['required'],
                'jenis' => ['required'],
                'besar' => ['required']

            ]);
            if (potongan::create($post)) {
                return redirect('/potongan')->with('sukses', 'Data potongan Berhasil Ditambah');
            } else {
                return redirect('/potongan')->with('gagal', 'Data potongan Gagal Ditambah');
            }
        } else {
            $post = $request->validate([
                'nama_potongan' => ['required'],
                'jenis' => ['required'],
            ]);
            $post['besar'] = $request->besar;
            if (potongan::create($post)) {
                return redirect('/potongan')->with('sukses', 'Data potongan Berhasil Diubah');
            } else {
                return redirect('/potongan')->with('gagal', 'Data potongan Gagal Diubah');
            }
        }
    }

    public function edit($id)
    {
        $potongan = potongan::find($id);
        return view('potongan.edit', ['potongan' => $potongan]);
    }

    public function update(Request $request)
    {


        if ($request->jenis == 'persen') {
            $post = $request->validate([
                'nama_potongan' => ['required'],
                'jenis' => ['required'],
                'besar' => ['required']
            ]);

            $potongan = potongan::find($request->id);
            if ($potongan->update($post)) {
                return redirect('/potongan')->with('sukses', 'Data potongan Berhasil Diubah');
            } else {
                return redirect('/potongan')->with('gagal', 'Data potongan Gagal Diubah');
            }
        } else {
            $post = $request->validate([
                'nama_potongan' => ['required'],
                'jenis' => ['required'],
            ]);
            $post['besar'] = $request->besar;
            $potongan = potongan::find($request->id);
            if ($potongan->update($post)) {
                return redirect('/potongan')->with('sukses', 'Data potongan Berhasil Diubah');
            } else {
                return redirect('/potongan')->with('gagal', 'Data potongan Gagal Diubah');
            }
        }
    }

    public function delete($id)
    {
        $potongan = potongan::find($id);
        if ($potongan->delete()) {
            return redirect('/potongan')->with('sukses', 'Data potongan Berhasil Dihapus');
        } else {
            return redirect('/potongan')->with('gagal', 'Data potongan Gagal Dihapus');
        }
    }
}
