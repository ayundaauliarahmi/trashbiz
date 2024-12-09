<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        {
            if(request('search')){
                $users->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('alamat', 'like', '%' . request('search') . '%')
                    ->orWhere('no_hp_wa', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('jabatan', 'like', '%' . request('search') . '%')
                    ->orWhere('password', 'like', '%' . request('search') . '%');
            }
        }
        
        $users = $users->all();
        return view('dashboard-admin.admin.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard-admin.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jabatan' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        User::create($validated);
        return redirect()->route('admin.index')->with('pesan', 'Data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $dataUser = User::findOrFail($id);
        return view('dashboard-admin.admin.edit', compact('dataUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'jabatan' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $dataUser = User::findOrFail($id);
        $dataUser->update($request->all());
        $dataUser->save();
        return redirect()->route('admin.index')->with('success', 'Data sampah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        user::destroy($id);
        return redirect('/admin')->with('success', 'Data berhasil di hapus');
    }

    public function show($id)
    {
        $users= User::findOrFail($id);
        return response()->json($users);
    }

    public function showAll()
    {
        $users = User::all();
        return response()->json($user);
    }
}
