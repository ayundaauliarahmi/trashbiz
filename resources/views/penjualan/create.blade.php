@extends('layouts.main')
    <div class="fixed z-50 inset-0">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-2xl leading-6 font-bold text-primary">Formulir Pembelian</h3>
                </div>
                <form action="{{ route('penjualan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-4">
                        <label for="pembeli" class="block text-sm font-medium text-gray-700">Nama Pembeli</label>
                        <input type="text" id="pembeli" name="pembeli" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="produk" class="block text-sm font-medium text-gray-700">Produk</label>
                        <select id="produk" name="produk" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                            <option value="" disabled selected>Pilih Produk</option>
                            @foreach($produk as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                            @endforeach
                        </select>
                    </div>                    
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" id="price" name="price" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required >
                    </div>
                    <div class="mb-4">
                        <label for="no_telp" class="block text-sm font-medium text-gray-700">Nomor WA</label>
                        <input type="text" id="no_telp" name="no_telp" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="banyak_barang" class="block text-sm font-medium text-gray-700">Banyak Barang</label>
                        <input type="number" id="banyak_barang" name="banyak_barang" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran </label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                            <option value="cod">Cash on Delivery (COD)</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400"
                            onclick="window.location.href='{{ route('penjualan.index') }}'">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
