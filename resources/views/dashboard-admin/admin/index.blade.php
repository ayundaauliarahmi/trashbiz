<x-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Data User</h1>

        <!-- Tombol Aksi -->
        <div class="mb-4">
            <a href="{{ route('admin.create') }}" 
                class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700">
                Tambah User
            </a>
        </div>

        <!-- Tabel Data Admin -->
        <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-hijau text-white">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama</th>
                    <th class="px-4 py-2 border-b">Alamat</th>
                    <th class="px-4 py-2 border-b">No.Hp(WA)</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Level</th>
                    <th class="px-4 py-2 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $dataAdmin)
                <tr>
                    <td class="px-4 py-2 border-b text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $dataAdmin->nama }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $dataAdmin->alamat }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $dataAdmin->no_hp_wa }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $dataAdmin->email }}</td>
                    <td class="px-4 py-2 border-b text-center">{{ $dataAdmin->level }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        <a href="{{ route('admin.update', $dataAdmin->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                        <form action="{{ route('admin.destroy', $dataAdmin->id) }}" method="POST" class="inline-block">
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
    </div>
</div>
</x-layout>