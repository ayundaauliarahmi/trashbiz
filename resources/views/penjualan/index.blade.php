<x-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Daftar Penjualan</h1>
    
        <!-- Pesan sukses -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif
    
        <!-- Tombol Tambah -->
        <div class="mb-4">
            <a href="{{ route('penjualan.create') }}" 
               class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700">
               Tambah Penjualan
            </a>
        </div>
    
        <!-- Tabel Penjualan -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-hijau text-white">
                    <tr>
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Nama Pembeli</th>
                        <th class="px-4 py-2 border-b">Produk</th>
                        <th class="px-4 py-2 border-b">Harga</th>
                        <th class="px-4 py-2 border-b">Nomor Telepon</th>
                        <th class="px-4 py-2 border-b">Alamat</th>
                        <th class="px-4 py-2 border-b">Banyak Barang</th>
                        <th class="px-4 py-2 border-b">Metode Pembayaran</th>
                        <th class="px-4 py-2 border-b">Total</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penjualan as $key => $item)
                        <tr>
                            <td class="px-4 py-2 border-b text-center">{{ $key + 1 }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $item->pembeli }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $item->produk }}</td>
                            <td class="px-4 py-2 border-b text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $item->no_telp }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $item->alamat }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ $item->banyak_barang }}</td>
                            <td class="px-4 py-2 border-b text-center">{{ ucfirst($item->metode_pembayaran) }}</td>
                            <td class="px-4 py-2 border-b text-center">Rp {{ number_format($item->price * $item->banyak_barang, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border-b text-center">
                                <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                                <a 
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_telp) }}?text={{ urlencode("Halo " . $item->pembeli . ",\n\nResi pesanan Anda :\nProduk : " . $item->produk . "\nHarga : Rp." . number_format($item->price, 0, ',', '.') . "\nJumlah : " . $item->banyak_barang . "\nTotal Harga : Rp." . number_format($item->price * $item->banyak_barang, 0, ',', '.') . "\nMetode Pembayaran : " .  $item->metode_pembayaran . "\n\nTerima kasih telah berbelanja!") }}" 
                                    target="_blank" 
                                    class="text-red-500 hover:underline">
                                    Kirim Resi
                                </a> 
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center px-4 py-2 border-b">Tidak ada data penjualan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
