<x-layout>
<div class="fixed z-50 inset-0">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
            <div class="flex justify-between items-center pb-3">
                <h3 class="text-2xl leading-6 font-bold text-primary">Edit Data Admin</h3>
                <button class="text-gray-400 hover:text-gray-500" onclick="closeModal('editModal')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form action="{{ route('admin.update', $dataAdmin->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-bold mb-2">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $dataAdmin->nama }}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-bold mb-2">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $dataAdmin->alamat }}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="no_hp_wa" class="block text-sm font-bold mb-2">No.Hp(WA)</label>
                    <input type="text" name="no_hp_wa" id="no_hp_wa" value="{{ $dataAdmin->no_hp_wa }}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold mb-2">Email</label>
                    <input type="text" name="email" id="email" value="{{ $dataAdmin->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold mb-2">Password</label>
                    <input type="text" name="password" id="password" value="{{ $dataAdmin->password }}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="level" class="block text-sm font-medium text-gray-700">level</label>
                    <select id="level" name="level"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-hijau focus:border-hijau sm:text-sm">
                        <option value="Admin" {{ $dataAdmin->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Nasabah" {{ $dataAdmin->level == 'Nasabah' ? 'selected' : '' }}>Nasabah</option>
                    </select>
                </div>
                
                <div class="flex justify-end">
                    <button type="button"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400"
                        onclick="closeModal('editModal')">Cancel</button>
                    <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layout>