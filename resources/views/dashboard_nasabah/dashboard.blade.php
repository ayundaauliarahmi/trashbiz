<x-layout>
    <div class="flex flex-col space-y-6">
        <!-- Header Dashboard -->
        <div class="bg-primary text-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold">Dashboard Nasabah</h1>
            <p class="mt-2 text-lg">Selamat datang, {{ Auth::user()->nama }}!</p>
        </div>

        <!-- Informasi Saldo, Poin, dan Transaksi -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <a href="{{ route('riwayat.setoranNasabah') }}" class="block">
                    <h2 class="text-xl font-semibold text-gray-900">Saldo</h2>
                    <p class="mt-2 text-2xl font-bold text-gray-800">Rp.{{ number_format($saldo, 0, ',', '.') }}</p> <!-- Format saldo -->
                </a>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md">
                <a href="{{ route('riwayat.setoranNasabah') }}">
                    <h2 class="text-xl font-semibold text-gray-900">Total Poin</h2>
                    <p class="mt-2 text-2xl font-bold text-gray-800">{{ $totalPoin }} Poin</p>
                </a>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md">
                <a href="{{ route('riwayat.setoranNasabah') }}">
                    <h2 class="text-xl font-semibold text-gray-900">Total Transaksi</h2>
                    <p class="mt-2 text-2xl font-bold text-gray-800">{{ $totalTransaksi }} Transaksi</p>
                </a>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="bg-custom-green p-6 rounded-lg shadow-md">
            <a href="{{ route('riwayat.setoranNasabah') }}" class="flex flex-col text-slate-700 hover:bg-blue-100 transition duration-300 p-4 rounded">
                <h2 class="text-xl font-semibold text-gray-900">Aktivitas Terbaru</h2>
                <div class="mt-4">
                    @if($dataSetorans->isEmpty())
                        <p class="text-gray-800">Belum ada aktivitas setoran.</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($dataSetorans as $setoran)
                                <li class="border-b pb-2">
                                    <p class="text-gray-800">Setoran sampah pada {{ $setoran->tanggal }}: {{ $setoran->setor }} kg {{ $setoran->sampah->jenis }}</p>
                                    <p class="text-gray-600 text-sm">Total Poin: {{ floor($setoran->setor / 2) }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </a>
        </div>
    </div>
</x-layout>
