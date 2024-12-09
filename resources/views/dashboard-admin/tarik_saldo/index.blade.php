<x-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Permintaan Penarikan</h1>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('tarik_saldo.create') }}" 
            class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-green-700">
            Ajukan Penarikan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Tanggal</th>
                    <th class="px-4 py-2 border-b">Nama Nasabah</th>
                    <th class="px-4 py-2 border-b">Jumlah Penarikan</th>
                    <th class="px-4 py-2 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penarikans as $index => $penarikan)
                    <tr>
                        <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ \Carbon\Carbon::parse($penarikan->tanggal)->format('d-m-Y') }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $penarikan->user->nama ?? 'Nasabah Tidak Ditemukan' }}</td>
                        <td class="px-4 py-2 border-b text-center">Rp.{{ number_format($penarikan->jumlah, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border-b text-center flex justify-center">
                            <form action="{{ route('penarikan.update-status', $penarikan->id) }}" method="POST" class="text-pribg-primary hover:text-pribg-primary mr-2">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Diterima">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    Disetujui
                                </button>
                            </form>

                            <!-- Form Ditolak -->
                            <form action="{{ route('penarikan.update-status', $penarikan->id) }}" method="POST" class="text-pribg-primary hover:text-pribg-primary mr-2">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Ditolak">
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 ml-4">
                                    Ditolak
                                </button>
                            </form>
                        </td>   
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data penarikan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
</x-layout>
