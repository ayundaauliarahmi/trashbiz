<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\Setoran;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabahs = Nasabah::latest();

        if (request('search')) {
            $nasabahs->where('no_induk', 'like', '%' . request('search') . '%')
                ->orWhere('nama', 'like', '%' . request('search') . '%')
                ->orWhere('alamat', 'like', '%' . request('search') . '%')
                ->orWhere('jumlah_orang_kk', 'like', '%' . request('search') . '%');
        }
        $nasabahs = $nasabahs->latest();
        return view('dashboard-admin.nasabah.index', ['nasabahs' => $nasabahs->paginate(10)]);
        
    }

    public function create()
    {
        return view('dashboard-admin.nasabah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_induk' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jumlah_orang_kk' => 'required|integer',
        ]);

        Nasabah::create($validated);
        return redirect()->route('nasabah.index')->with('pesan', 'Data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $dataNasabah = Nasabah::findOrFail($id);
        return view('dashboard-admin.nasabah.edit', compact('dataNasabah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_induk' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jumlah_orang_kk' => 'required|integer',
        ]);

        $dataNasabah = Nasabah::findOrFail($id);
        $dataNasabah->update($request->all());
        $dataNasabah->save();
        return redirect()->route('nasabah.index')->with('success', 'Data sampah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $setoranCount = Setoran::where('nama_nasabah', $id)->count();

        if ($setoranCount > 0) {
            return redirect()->route('nasabah.index')->with('error', 'Nasabah tidak bisa dihapus karena masih memiliki setoran.');
        }

        Nasabah::destroy($id);
        return redirect('/nasabah')->with('success', 'Data berhasil dihapus');
    }
    public function show($id)
    {
        $nasabah = Nasabah::findOrFail($id);
        return response()->json($nasabah);
    }

    public function showAll()
    {
        $nasabah = Nasabah::all();
        return response()->json($nasabah);
    }
}
