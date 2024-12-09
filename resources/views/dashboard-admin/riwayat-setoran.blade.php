<x-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Riwayat Setoran</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-hijau text-white">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Tanggal</th>
                    <th class="px-4 py-2 border-b">Nasabah</th>
                    <th class="px-4 py-2 border-b">Jumlah Setoran (Kg)</th>
                    <th class="px-4 py-2 border-b">Total Setoran</th>
                    <th class="px-4 py-2 border-b">Poin</th>
                    <th class="px-4 py-2 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($setorans as $index => $dataSetoran)
                    @php
                        $poin = floor($dataSetoran['jumlah_setoran'] / 2);
                    @endphp
                    <tr>
                        <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran['tanggal'] }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran['nasabah'] }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran['jumlah_setoran'] }} Kg</td>
                        <td class="px-4 py-2 border-b text-center">{{ $dataSetoran['total_setoran'] }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $poin }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="{{ route('setoran-detail', $dataSetoran['id']) }}" class="text-blue-600 hover:underline">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
