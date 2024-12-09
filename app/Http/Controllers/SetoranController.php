<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetoranController extends Controller
{
    
    public function index(Request $request)
    {
        $setoransQuery = Setoran::with('nasabah', 'sampah')->latest();

        if ($request->has('search')) {
            $setoransQuery->whereHas('nasabah', function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->search . '%');
            })->orWhereHas('sampah', function ($query) use ($request) {
                $query->where('jenis', 'like', '%' . $request->search . '%');
            })->orWhere('tanggal', 'like', '%' . $request->search . '%')
            ->orWhere('setor', 'like', '%' . $request->search . '%');
        }
        $setorans = $setoransQuery->paginate(10);

        $setoransGrouped = $setorans->groupBy(function ($item) {
            return $item->nasabah->nama;
        });

        return view('dashboard-admin.setoran.index', ['setorans' => $setoransGrouped]);
    }

    public function riwayatSetoran(Request $request)
    {
        $setoransQuery = Setoran::with('nasabah')->latest();

        $setorans = $setoransQuery->get()
            ->groupBy(function ($item) {
                return $item->nasabah->nama . '|' . $item->tanggal; 
            })
            ->map(function ($group) {
                return [
                    'nasabah' => $group->first()->nasabah->nama,
                    'tanggal' => $group->first()->tanggal,
                    'jumlah_setoran' => $group->sum('setor'),
                    'total_setoran' => $group->sum('jumlah_setoran'),
                    'id' => $group->first()->id,
                ];
            })
            ->values();

        return view('dashboard-admin.riwayat-setoran', compact('setorans'));
    }

    public function riwayatSetoranNasabah(Request $request)
    {
        $setoransQuery = Setoran::with('nasabah')->latest();

        if ($request->has('search')) {
            $searchTerm = $request->search;

            $setoransQuery->where(function ($query) use ($searchTerm) {
                $query->whereHas('nasabah', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('nama', 'like', '%' . $searchTerm . '%');
                })
                ->orWhere('tanggal', 'like', '%' . $searchTerm . '%');
            });
        }

        $setorans = $setoransQuery->get()
            ->groupBy(function ($item) {
                return $item->nasabah->nama . '|' . $item->tanggal;
            })
            ->map(function ($group) {
                return [
                    'nasabah' => $group->first()->nasabah->nama,
                    'tanggal' => $group->first()->tanggal,
                    'jumlah_setoran' => $group->sum('setor'),
                    'total_setoran' => $group->sum('jumlah_setoran'),
                    'id' => $group->pluck('id')->first(),
                ];
            })
            ->values();

        return view('dashboard_nasabah.riwayat-setoranNasabah', compact('setorans'));
    }


    public function create()
    {
        
    $nasabahs = Nasabah::all();
    $sampahs = Sampah::all();
    return view('dashboard-admin.setoran.create', compact('nasabahs', 'sampahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_nasabah' => 'required|exists:nasabahs,id',
            'jenis_sampah' => 'required|exists:sampahs,id',  
            'tanggal' => 'required|date',
            'setor' => 'required|numeric|min:0',
        ]);

        $harga = Sampah::find($validated['jenis_sampah'])->harga;

        Setoran::create([
            'nama_nasabah' => $validated['nama_nasabah'],
            'jenis_sampah' => $validated['jenis_sampah'],
            'tanggal' => $validated['tanggal'],
            'setor' => $validated['setor'],
            'jumlah_setoran' => $validated['setor'] * $harga,
        ]);

        return redirect()->route('setoran.index')->with('pesan', 'Data berhasil ditambahkan');
    }  
    
    public function edit($id)
    {
        $dataSetoran = Setoran::with(['nasabah', 'sampah'])->findOrFail($id);
        $nasabahs = Nasabah::all(); 
        $sampahs = Sampah::all(); 
        return view('dashboard-admin.setoran.edit', compact('dataSetoran', 'nasabahs', 'sampahs')); 
    }

    public function update(Request $request, $id)
    {
        $dataSetoran = Setoran::findOrFail($id);

     
        $validated = $request->validate([
            'nama_nasabah' => 'required|exists:nasabahs,id', // ID Nasabah
            'jenis_sampah' => 'required|exists:sampahs,id',   // ID Jenis Sampah
            'tanggal' => 'required|date',
            'setor' => 'required|numeric|min:0',
        ]);

        $harga = Sampah::find($validated['jenis_sampah'])->harga;

        $dataSetoran->update([
            'nama_nasabah' => $validated['nama_nasabah'],
            'jenis_sampah' => $validated['jenis_sampah'],
            'tanggal' => $validated['tanggal'],
            'setor' => $validated['setor'],
            'jumlah_setoran' => $validated['setor'] * $harga,
        ]);

        return redirect()->route('setoran.index')->with('pesan', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dataSetoran = Setoran::findOrFail($id);
        $dataSetoran->delete();

        return redirect()->route('setoran.index')->with('pesan', 'Data berhasil dihapus');
    }

    public function show($id)
    {
        $dataSetoran = Setoran::with(['nasabah', 'sampah'])
            ->where('id', $id)
            ->first();

        $groupedSetorans = Setoran::with(['sampah', 'nasabah'])
            ->where('tanggal', $dataSetoran->tanggal)
            ->whereHas('nasabah', function($query) use ($dataSetoran) {
                $query->where('nama', $dataSetoran->nasabah->nama);
            })
            ->get()
            ->groupBy(function($item) {
                return $item->nasabah->nama . '|' . $item->tanggal;
            });

        return view('dashboard-admin.setoran-detail', compact('dataSetoran', 'groupedSetorans'));
    }

    public function showNasabah($id)
    {
        $dataSetoran = Setoran::with(['nasabah', 'sampah'])
            ->where('id', $id)
            ->first();

        $groupedSetorans = Setoran::with(['sampah', 'nasabah'])
            ->where('tanggal', $dataSetoran->tanggal)
            ->whereHas('nasabah', function($query) use ($dataSetoran) {
                $query->where('nama', $dataSetoran->nasabah->nama);
            })
            ->get()
            ->groupBy(function($item) {
                return $item->nasabah->nama . '|' . $item->tanggal;
            });

        return view('dashboard_nasabah.setoran-detailNasabah', compact('dataSetoran', 'groupedSetorans'));
    }


 
}
