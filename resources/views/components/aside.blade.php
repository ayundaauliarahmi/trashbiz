<aside id="sidebar" class="sidebar flex flex-col border-r bg-white">
    <div class="bg-primary h-20 flex justify-center items-center">
        <h1 class="font-bold text-2xl text-white">TrashBiz</h1>
    </div>
    <nav class="flex-1 overflow-y-auto mt-5">
        <ul class="p-4 space-y-4">
            <li>
                @if(auth()->user()->level === 'Admin')
                    <a href="/dashboard-admin"
                        class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('admin.tampilan') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                        <span class="material-icons">home</span>
                        <span class="ml-2">Dashboard</span>
                    </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Nasabah')
                    <a href="/dashboard-nasabah"
                        class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('dashboard') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                        <span class="material-icons">home</span>
                        <span class="ml-2">Dashboard</span>
                    </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/admin"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('admin') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">admin_panel_settings</span>
                    <span class="ml-2">User</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/nasabah"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('nasabah') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">person</span>
                    <span class="ml-2">Nasabah</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/sampah"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('sampah') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">dataset</span>
                    <span class="ml-2">Sampah</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Nasabah')
                <a href="/data-sampah"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('data-sampah') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">dataset</span>
                    <span class="ml-2">Sampah</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/penjualan"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('penjualan') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">shopping_cart</span>
                    <span class="ml-2">Penjualan Produk</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/setoran"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('setoran-sampah') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">edit_square</span>
                    <span class="ml-2">Setoran Sampah</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/riwayat"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('riwayat') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">bookmark</span>
                    <span class="ml-2">Riwayat setoran</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Nasabah')
                <a href="/riwayatNasabah"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('riwayat') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">bookmark</span>
                    <span class="ml-2">Riwayat setoran</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Nasabah')
                <a href="/permintaan-penarikan"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('permintaan-penarikan') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">request_quote</span>
                    <span class="ml-2">Penarikan Saldo</span>
                </a>
                @endif
            </li>
            <li>
                @if(auth()->user()->level === 'Admin')
                <a href="/penarikan-saldo"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('penarikan-saldo') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">request_quote</span>
                    <span class="ml-2">Penarikan Saldo</span>
                </a>
                @endif
            </li>
            <li>
                <a href="/profile"
                    class="flex items-center text-sm font-bold p-2 rounded {{ request()->is('profile') ? 'bg-hijau text-white' : 'hover:bg-hijau hover:text-white' }}">
                    <span class="material-icons">manage_accounts</span>
                    <span class="ml-2">Profile</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="p-4">
        <a href="/logout" class="flex items-center text-sm p-2 font-bold rounded hover:bg-hijau hover:text-white">
            <span class="material-icons">logout</span>
            <span class="ml-2">Logout</span>
        </a>
    </div>
</aside>
