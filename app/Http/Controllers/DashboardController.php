<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahNasabah = Nasabah::count();
        $totalSaldo = Setoran::sum('jumlah_setoran');
        $totalSampahTerkumpul = Setoran::sum('setor');

        return view('dashboard-admin.dashboard', [
            'jumlahNasabah' => $jumlahNasabah,
            'totalSaldo' => $totalSaldo,
            'totalSampahTerkumpul' => $totalSampahTerkumpul,
        ]);
    }

    public function index2()
    {
        $user = Auth::user();
        $dataSetorans = Setoran::where('nama_nasabah', $user->nama)
        ->orderBy('tanggal', 'desc')
        ->get();

        $saldo = $dataSetorans->sum('jumlah_setoran');
        $totalPoin = $user->poin;
        $totalTransaksi = $dataSetorans->count();
      
        return view('dashboard_nasabah.dashboard', compact('dataSetorans', 'saldo', 'totalPoin', 'totalTransaksi'));
    }
    

}
