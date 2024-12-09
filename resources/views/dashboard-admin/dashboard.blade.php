<x-layout>
    <div class="flex flex-col space-y-6">
    <div class="bg-primary text-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold">Dashboard Admin</h1>
        <p class="mt-2 text-lg">Selamat datang, {{ Auth::user()->nama }}!</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
            class="bg-gradient-to-r from-green-200 to-blue-200 p-6 rounded-lg shadow-lg border border-gray-200 border-l-8 border-l-hijau">
            <h3 class="text-lg font-bold text-slate-700 mb-2">
                Penjualan Sampah
            </h3>
            <p class="text-4xl font-bold">RP. 1.000.000</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 border-l-8 border-l-hijau">
            <a href="{{ route('setoran.index') }}" class="flex flex-col text-slate-700 hover:bg-blue-100 transition duration-300 p-4 rounded">
                <h3 class="text-lg font-bold mb-2">
                    Sampah Terkumpul
                </h3>
                <p class="text-3xl font-bold">
                    {{ number_format($totalSampahTerkumpul, 0, ',', '.') }} KG
                </p>
            </a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 border-l-8 border-l-hijau">
            <a href="{{ route('nasabah.index') }}" class="flex flex-col text-slate-700 hover:bg-blue-100 transition duration-300 p-4 rounded">
                <h3 class="text-lg font-bold mb-2">
                    Jumlah Nasabah
                </h3>
                <p class="text-3xl font-bold">
                    {{ $jumlahNasabah }} Orang
                </p>
            </a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 border-l-8 border-l-hijau">
            <a href="{{ route('setoran.index') }}" class="flex flex-col text-slate-700 hover:bg-blue-100 transition duration-300 p-4 rounded">
                <h3 class="text-lg font-bold mb-2">
                    Total Saldo Nasabah
                </h3>
                <p class="text-3xl font-bold">
                    Rp. {{ number_format($totalSaldo, 0, ',', '.') }}
                </p>
            </a>
        </div>
    </div>
</div>
</x-layout>
