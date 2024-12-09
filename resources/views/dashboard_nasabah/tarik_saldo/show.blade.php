<x-layout>
<!-- MODAL LIHAT PENARIKAN -->
<div id="lihatPenarikanModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-2xl leading-6 font-bold text-primary">Detail Penarikan</h3>
                <button class="text-gray-400 hover:text-gray-500" onclick="closeModal('lihatPenarikanModal')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                <p class="mt-1 text-gray-900">2024-07-01</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jumlah Penarikan</label>
                <p class="mt-1 text-gray-900">$500</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <p class="mt-1 text-gray-900">Pending</p>
            </div>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400"
                    onclick="closeModal('lihatPenarikanModal')">Close</button>
            </div>
        </div>
    </div>
</div>
</x-layout>