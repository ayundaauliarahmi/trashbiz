<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Session;

class penjualanController extends Controller
{
    public function index()
    {
         $penjualan = Penjualan::with('produk')->get();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('penjualan.create', compact('produk'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'pembeli' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|in:cod,transfer',
            'banyak_barang' => 'required|integer|min:1',
        ]);

        Penjualan::create($validatedData);
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan!');
    }

    public function checkout()
    {
        $penjualan = session()->get('penjualan', []);
        session()->forget('penjualan');

        return view('penjualan.checkout', compact('penjualan'));
    }
}
