<x-layout>
    <div class="fixed z-50 inset-0">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-2xl leading-6 font-bold text-primary">Tambah Setoran</h3>
                    <button class="text-gray-400 hover:text-gray-500">
                        <a href="{{ route('setoran.index') }}" class="material-icons">close</a>
                    </button>
                </div>

                <form action="{{ route('setoran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_nasabah" class="block text-sm font-medium text-gray-700">Nasabah</label>
                        <select name="nama_nasabah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm">
                            <option value="">Pilih Nasabah</option>
                            @foreach ($nasabahs as $dataNasabah)
                                <option value="{{ $dataNasabah->id }}">{{ $dataNasabah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="jenis_sampah" class="block text-sm font-medium text-gray-700">Sampah</label>
                        <select name="jenis_sampah" id="jenis_sampah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm">
                            <option value="">Pilih Sampah</option>
                            @foreach ($sampahs as $dataSampah)
                                <option value="{{ $dataSampah->id }}">{{ $dataSampah->jenis }}</option>
                            @endforeach
                        </select>
                    </div>                    
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                    </div>
                                    
                    <div class="mb-4">
                        <label for="setor" class="block text-sm font-medium text-gray-700">Setor/kg</label>
                        <input type="number" name="setor" id="setor" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400"
                            onclick="window.location.href='{{ route('setoran.index') }}'">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
