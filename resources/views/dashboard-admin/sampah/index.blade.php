<x-layout>
    <!-- Main conten -->
    <div class="mb-6">
        <h1 class="font-bold text-3xl text-gray-900">
            Data Sampah
        </h1>
    </div>
     <!-- Table -->
    <div class="fixed z-10 inset-0 bg-gray-800 bg-opacity-50 backdrop-blur-sm hidden" id="overlay"></div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('sampah.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700"> 
                        Tambah Jenis Sampah
                    </a>
            </div>
            <div>
                <input type="text" placeholder="Cari nama sampah..."
                    class="px-4 py-2 border border-gray-300 rounded-lg" />
            </div>
        </div>
        <!-- Tabel Data Sampah -->
        <table class="table-fixed min-w-full border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-hijau text-white">
                <tr>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border-2 border-gray-300">
                        No</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border-2 border-gray-300">
                        Gambar</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border-2 border-gray-300">
                        Jenis Sampah</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border-2 border-gray-300">
                        Harga/Kg</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border-2 border-gray-300">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white" id="wasteTableBody">
                @foreach($sampahs as $dataSampah)
                <tr>
                    <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-center border-2 border-gray-300">
                        <div class="flex justify-center">
                            <img src="{{ asset('img/' . $dataSampah->gambar) }}" alt="{{ $dataSampah->gambar }}" class="w-40 h-20 object-contain">
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $dataSampah->jenis }}</td>
                    <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $dataSampah->harga }}</td>
                    <td class="px-6 py-4 text-center border-2 border-gray-300">
                        <div class="inline-flex space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('sampah.update', $dataSampah->id) }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 inline-flex items-center">
                                <span class="material-icons align-middle">edit</span>
                            </a>
                    
                            <!-- Tombol Hapus -->
                            <form action="{{ route('sampah.destroy', $dataSampah->id) }}" method="POST" class="inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 inline-flex items-center" 
                                    onclick="return confirm('Yakin akan menghapus data?')">
                                    <span class="material-icons align-middle">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</x-layout>