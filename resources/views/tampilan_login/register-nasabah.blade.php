@extends('layouts.main')

@section('content')

<div class="font-Quicksand">
    <div class="bg-slate-100 min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white shadow-xl flex flex-col lg:flex-row rounded-xl overflow-hidden lg:w-4/5 2xl:w-2/3 transition-transform"
            id="auth-container">
            <!-- Register Form -->
            <div class="p-6 lg:w-1/3" id="register-form">
                <h1 class="font-bold text-gray-700 text-xl md:text-2xl">
                    Form Register Nasabah
                </h1>
                <form action="{{ route('register.nasabah') }}" method="POST" class="flex flex-col">
                    @csrf

                    @if ($errors->any())
                        <div class="mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 text-xs">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="flex flex-col mb-3 relative">
                        <i class="fi fi-rr-user absolute top-9 right-5 text-zinc-400"></i>
                        <label for="nama" class="mb-1 text-gray-900 text-sm">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama anda" required
                            class="px-3 py-2 border-2 border-slate-300 rounded-md max-w-full focus:border-hijau focus:outline-none text-sm" />
                    </div>
                    <div class="flex flex-col mb-3 relative">
                        <i class="fi fi-rr-envelope absolute top-9 right-5 text-zinc-400"></i>
                        <label for="register-email" class="mb-1 text-gray-900 text-sm">Email</label>
                        <input type="email" id="register-email" name="email" placeholder="Masukkan email anda" required
                            class="px-3 py-2 border-2 border-slate-300 rounded-md max-w-full focus:border-hijau focus:outline-none text-sm" />
                    </div>
                    <div class="flex flex-col mb-3 relative">
                        <i class="fi fi-rr-map-pin absolute top-9 right-5 text-zinc-400"></i>
                        <label for="alamat" class="mb-1 text-gray-900 text-sm">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required
                            class="px-3 py-2 border-2 border-slate-300 rounded-md max-w-full focus:border-hijau focus:outline-none text-sm" />
                    </div>
                    <div class="flex flex-col mb-3 relative">
                        <i class="fas fa-phone absolute top-9 right-5 text-zinc-400"></i> <!-- Ganti ikon di sini -->
                        <label for="no_hp_wa" class="mb-1 text-gray-900 text-sm">No.Telp</label>
                        <input type="text" id="no_hp_wa" name="no_hp_wa" placeholder="Masukkan Nomor Telepon Anda" required
                            class="px-3 py-2 border-2 border-slate-300 rounded-md max-w-full focus:border-hijau focus:outline-none text-sm" />
                    </div>
                    <div class="flex flex-col mb-3 relative">
                        <i class="fi fi-rr-lock absolute top-9 right-5 text-gray-400"></i>
                        <label for="register-password" class="mb-1 text-gray-900 text-sm">Password</label>
                        <input type="password" id="register-password" name="password" placeholder="Buat password anda" required
                            class="px-3 py-2 border-2 border-slate-300 rounded-md max-w-full focus:outline-none focus:border-hijau text-sm" />
                    </div>
                    <div class="flex flex-col mb-3 relative">
                        <i class="fi fi-rr-lock absolute top-9 right-5 text-gray-400"></i>
                        <label for="register-confirm-password" class="mb-1 text-gray-900 text-sm">Konfirmasi Password</label>
                        <input type="password" id="register-confirm-password" name="password_confirmation" placeholder="Konfirmasi Password Anda" required
                            class="px-3 py-2 border-2 border-slate-300 rounded-md max-w-full focus:outline-none focus:border-hijau text-sm" />
                    </div>
                    <button type="submit"
                        class="my-3 bg-primary hover:bg-hijau text-white font-medium text-base px-3 py-2 rounded-md">
                        Register
                    </button>
                </form>                
                <p class="text-gray-900 text-sm">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}" class="text-blue-500 font-bold underline" onclick="showLogin()">Login</a>
                </p>
            </div>
             <!-- Image -->
             <div class="hidden lg:block lg:w-2/3 transition-transform transform" id="login-image">
                <img src="{{ asset('img/icon.png') }}" alt="Placeholder Image" class="h-full w-full object-cover" />
            </div>
        </div>
    </div>
</div>
@endsection
