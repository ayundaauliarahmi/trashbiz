<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $users=User::latest();
        {
            if(request('search')){
                $users->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('alamat', 'like', '%' . request('search') . '%')
                ->orWhere('no_hp_wa', 'like', '%' . request('search') . '%')
                ->orWhere('level', 'like', '%' . request('search') . '%')
                ->orWhere('password', 'like', '%' . request('search') . '%');
            }
        }
        
        $users = $users->latest();
        return view('dashboard-admin.admin.index', ['users' => $users->paginate(10)]);
    }

    public function create()
    {
        return view('dashboard-admin.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        User::create($validated);
        return redirect()->route('admin.index')->with('pesan', 'Data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $dataAdmin = User::findOrFail($id);
        return view('dashboard-admin.admin.edit', compact('dataAdmin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'alamat' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $dataAdmin = User::findOrFail($id);
        $dataAdmin->update($request->all());
        $dataAdmin->save();
        return redirect()->route('admin.index')->with('success', 'Data sampah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin')->with('success', 'Data berhasil di hapus');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    public function showAll()
    {
        $users = User::all();
        return response()->json($users);
    }
}
