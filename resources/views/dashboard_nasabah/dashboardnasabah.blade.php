<x-layout>
    <div class="bg-primary text-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold">Dashboard Nasabah</h1>
        <p class="mt-2 text-lg">Selamat datang, {{ Auth::user()->nama }}!</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full border-2 border-gray-200 divide-y divide-gray-200 mb-4">
            <thead class="bg-hijau text-white">
            </thead>
            <tbody class="bg-white text-center">
                @php 
                    $counter = 1; 
                    $totalBerat = 0; 
                    $totalSetoran = 0; 
                    $totalPoin = 0; 
                @endphp
                @foreach($setorans as $index => $dataSetoran)
                    @if(Auth::user()->nama == $dataSetoran['nasabah'])
                        @php
                            $poin = floor($dataSetoran['jumlah_setoran'] / 2);
                            $totalBerat += $dataSetoran['jumlah_setoran'];
                            $totalSetoran += $dataSetoran['total_setoran'];
                            $totalPoin += $poin;
                        @endphp
                      
                    @endif
                @endforeach
            </tbody>
        </table>

      
        
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Berat Setoran -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="font-semibold text-gray-900">Total Berat Setoran (Kg):</p>
                    <p class="text-center text-2xl font-bold text-gray-800">{{ number_format($totalBerat, 2, ',', '.') }} Kg</p>
                </div>
        
                <!-- Total Setoran -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <a href="{{ route('riwayat.setoranNasabah') }}" class="block">
                    <p class="font-semibold text-gray-900">Saldo:</p>
                    <p class="text-center text-2xl font-bold text-gray-800">Rp.{{ number_format($totalSetoran, 0, ',', '.') }}</p>
                </div>
        
                <!-- Total Poin -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="font-semibold text-gray-900">Total Poin:</p>
                    <p class="text-center text-2xl font-bold text-gray-800">{{ $totalPoin }} Poin</p>
                </div>
            </div>
        </div>
        
    </div>
</x-layout>
