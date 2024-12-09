<x-layout>
    <!-- MODAL TAMBAH PENARIKAN -->
    <div class="fixed z-50 inset-0">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-2xl leading-6 font-bold text-primary">Ajukan Penarikan</h3>
                    <button class="text-gray-400 hover:text-gray-500">
                        <a href="{{ route('tarik_saldo.index') }}" class="material-icons">close</a>
                    </button>
                </div>
                <form action="{{ route('tarik_saldo.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Penarikan</label>
                        <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Penarikan</label>
                        <input type="text" name="jumlah" id="jumlah" min="1" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" required>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('tarik_saldo.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400">Batal</a>
                        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark">Ajukan</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    </x-layout>