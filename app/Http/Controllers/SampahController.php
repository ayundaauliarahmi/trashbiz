<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs=Sampah::all();
        {
            if(request('search')){
                $sampahs->where('gambar', 'like', '%' . Request('search') . '%')
                ->orWhere('jenis', 'like', '%' . Request('search') . '%')
                ->orWhere('harga', 'like', '%' . Request('search') . '%');
            }
        }
        $sampahs = Sampah::all(); 
        return view('dashboard-admin.sampah.index',compact('sampahs'));
    }

    public function indexNasabah()
    {
        {
            if(request('search')){
                $sampahs->where('gambar', 'like', '%' . Request('search') . '%')
                ->orWhere('jenis', 'like', '%' . Request('search') . '%')
                ->orWhere('harga', 'like', '%' . Request('search') . '%');
            }
        }
        $sampahs = Sampah::all(); 
        return view('dashboard_nasabah.sampah',compact('sampahs'));
    }

    public function create()
    {
        return view('dashboard-admin.sampah.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
            $validated['gambar'] = $fileName;
        }
        
        Sampah::create($validated);
        return redirect()->route('sampah.index')->with('pesan','Data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $dataSampah = Sampah::findOrFail($id);

        return view('dashboard-admin.sampah.edit', compact('dataSampah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|max:2048', 
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $dataSampah = Sampah::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($dataSampah->gambar) {
                Storage::delete('public/' . $dataSampah->gambar);
            }
                $filePath = $request->file('gambar')->store('img', 'public');
                $dataSampah->gambar = $filePath;
            }

            $dataSampah->jenis = $request->jenis;
            $dataSampah->harga = $request->harga;
            $dataSampah->save();

            return redirect()->route('sampah.index')->with('success', 'Data sampah berhasil diperbarui.');
    }


    public function destroy($id)
    {
        Sampah::destroy($id);
        return redirect('/sampah')->with('pesan','Data berhasil di hapus');
    }
    public function show($id)
    {
        $sampah = Sampah::findOrFail($id);
        return response()->json($sampah);
    }

    public function showAll()
    {
        $sampah = Sampah::all();
        return response()->json($sampah);
    }
}
