<x-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Data Setoran</h1>
    
    <!-- Tombol Aksi -->
        <div class="mb-4">
            <a href="{{ route('setoran.create') }}" 
                class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700"> 
                Tambah Setoran
            </a>
        </div>

    @foreach($setorans as $nasabah => $setoransPerNasabah)
        <h2 class="font-bold text-xl text-gray-800 mb-4">{{ $nasabah }}</h2>
        <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-hijau text-white">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Sampah</th>
                    <th class="px-4 py-2 border-b">Tanggal</th>
                    <th class="px-4 py-2 border-b">Setoran/Kg</th>
                    <th class="px-4 py-2 border-b">Setoran</th>
                    <th class="px-4 py-2 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($setoransPerNasabah as $dataSetoran)
                    <tr>
                        <td class="px-4 py-2 border-b text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran->sampah ? $dataSetoran->sampah->jenis : 'Jenis tidak tersedia' }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran->tanggal }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran->setor }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran->jumlah_setoran }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="{{ route('setoran.update', $dataSetoran->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                            <form action="{{ route('setoran.destroy', $dataSetoran->id) }}" method="POST" class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500 hover:underline" 
                                    onclick="return confirm('Yakin akan menghapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    @endforeach
</div>
</div>
</x-layout>

