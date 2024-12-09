<x-layout>
    <div class="fixed z-50 inset-0">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-2xl leading-6 font-bold text-primary">Detail Setoran</h3>
                    <button class="text-gray-400 hover:text-gray-500">
                        <a href="{{ route('riwayat.setoranNasabah') }}" class="material-icons">close</a>
                    </button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p><strong>Tanggal :</strong> {{ $dataSetoran->tanggal }}</p>
                    <p><strong>Nama Nasabah :</strong> {{ $dataSetoran->nasabah->nama }}</p>

                    <div class="mt-4">
                        <strong>Rincian Jenis Sampah dan Berat Setoran :</strong>
                        <ul>
                            @foreach($groupedSetorans as $setoranTanggal => $setorans)
                                @foreach($setorans as $setoran)
                                    <li>
                                        <p><strong>*</strong> {{ $setoran->sampah->jenis }} = {{ $setoran->setor }} Kg</p>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-4">
                        <p><strong>Total Setoran :</strong> Rp.{{ $dataSetoran->jumlah_setoran }}</p>
                        <p><strong>Total Poin :</strong> 
                            @php
                                $totalPoin = $groupedSetorans->sum(function($setorans) {
                                    return $setorans->sum(function($setoran) {
                                        return floor($setoran->setor / 2);
                                    });
                                });
                            @endphp
                            {{ $totalPoin }} <!-- Total poin untuk semua setoran pada tanggal tersebut -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
