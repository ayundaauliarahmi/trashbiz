<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Penarikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarikSaldoController extends Controller
{
    public function index()  
    {
        $penarikans = Penarikan::with('user') 
        ->where('user_id', auth()->user()->id) // Mengambil penarikan untuk nasabah yang login
        ->get();
        return view('dashboard_nasabah.tarik_saldo.index', compact('penarikans'));
    }

    public function index2()  
    {
        $penarikans = Penarikan::with('user')->get();
        return view('dashboard-admin.tarik_saldo.index', compact('penarikans'));
    }

    public function create()
    {
        return view('dashboard_nasabah.tarik_saldo.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
        ]);
        
        $user_id = Auth::id(); // Get the authenticated user's ID

        // Create the penarikan record
        Penarikan::create([
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'user_id' => $user_id, // Store the authenticated user's ID
        ]);
        return redirect()->route('tarik_saldo.index')->with('success', 'Penarikan berhasil diajukan!');
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:Diterima,Ditolak', // pastikan hanya status yang valid
        ]);

        // Mencari data penarikan berdasarkan ID
        $penarikan = Penarikan::findOrFail($id);

        // Mengupdate status penarikan
        $penarikan->status = $validated['status'];
        $penarikan->save();

        // Redirect to the list with a success message
        return redirect()->route('tarik_saldo2.index2')
            ->with('status', 'Penarikan berhasil diperbarui');
    }
}
