<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\Sampah;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardNasabah extends Controller
{
    
    

    public function DashboardNasabah(Request $request)
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

        return view('dashboard_nasabah.dashboardnasabah', compact('setorans'));
    }


    

 
}
