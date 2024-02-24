<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function json(Request $request)
    {
        if ($request->ajax()) {
            $users = User::latest()->get();

            return DataTables::of($users)
                ->editColumn('action', function ($row) {
                    $btn = '';
                    if (auth()->user()->role != 'superadmin') {
                        $btn = "<a class='btn btn-warning' href='" . url('/user/edit') . "/" . $row->id . "'>Edit</a>
                <button class='btn btn-danger deleteButton' data-url='" . url('/user/delete') . "/" . $row->id . "'>Hapus</button>";
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
        return view('user.tambah');
    }

    public function insert(Request $request)
    {
        $post = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        $post['password'] = bcrypt($request->password);
        if (User::create($post)) {
            return redirect('user')->with('sukses', 'Data User Berhasil Disimpan');
        } else {
            return redirect('user')->with('gagal', 'Data User Gagal Disimpan');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $post = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'role' => ['required']
        ]);

        if ($request->password) {
            $post['password'] = bcrypt($request->password);
        }

        $user = User::find($request->id);
        if ($user->update($post)) {
            return redirect('/user')->with('sukses', 'Data User Berhasil Diubah');
        } else {
            return redirect('/user')->with('gagal', 'Data User Gagal Diubah');
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect('/user')->with('sukses', 'Data User Berhasil Dihapus');
        } else {
            return redirect('/user')->with('gagal', 'Data User Gagal Dihapus');
        }
    }
}
