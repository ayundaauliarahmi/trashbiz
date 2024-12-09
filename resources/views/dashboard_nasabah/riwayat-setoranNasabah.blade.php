<x-layout>
    <div class="mb-6">
        <h1 class="font-bold text-3xl text-gray-900">
            Riwayat Setoran
        </h1>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full border-2 border-gray-200 divide-y divide-gray-200 mb-4">
            <thead class="bg-hijau text-white">
                <tr>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">No</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">Tanggal</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">Nasabah</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">Jumlah Setoran (Kg)</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">Total Setoran</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">Poin</th>
                    <th class="px-6 py-3 text-center font-bold uppercase tracking-wider border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white text-center">
                @php $counter = 1; @endphp
                @foreach($setorans as $index => $dataSetoran)
                    @if(Auth::user()->nama == $dataSetoran['nasabah'])
                        @php
                            $poin = floor($dataSetoran['jumlah_setoran'] / 2);
                        @endphp
                        <tr>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $counter++ }}</td>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $dataSetoran['tanggal'] }}</td>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $dataSetoran['nasabah'] }}</td>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $dataSetoran['jumlah_setoran'] }} Kg</td>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $dataSetoran['total_setoran'] }}</td>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">{{ $poin }}</td>
                            <td class="px-6 py-4 text-center border-2 border-gray-300">
                                <a href="{{ route('setoran-detailNasabah', $dataSetoran['id']) }}" class="text-blue-600 hover:underline">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>                      
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
