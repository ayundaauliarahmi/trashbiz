@extends('layouts.main')

@section('content')

<div class="font-Quicksand">
    <div class="bg-slate-100 min-h-screen flex items-center justify-center p-6 md:p-0">
        <div class="relative bg-white shadow-lg flex flex-col lg:flex-row rounded-xl overflow-hidden lg:w-2/3 2xl:w-1/2 transition-transform"
            id="auth-container">
            <!-- Login Form -->
            <div class="p-8 lg:w-1/2" id="login-form">
                <h1 class="font-bold text-gray-700 text-2xl md:text-3xl">
                    Form login
                </h1>
                <form action="{{ route('login') }}"  method="POST" class="flex flex-col">
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

                    <div class="flex flex-col mb-4 relative">
                        <i class="fi fi-rr-envelope absolute top-11 right-5 text-zinc-400"></i>
                        <label for="login-email" class="mb-2 text-gray-900">Email</label>
                        <input type="email" name="email" id="login-email" placeholder="Masukkan email anda"
                            class="px-4 py-2 border-2 border-slate-300 rounded-md max-w-full focus:border-hijau focus:outline-none" required />
                    </div>
                    <div class="flex flex-col relative">
                        <i class="fi fi-rr-lock absolute top-11 right-5 text-gray-400"></i>
                        <label for="login-password" class="mb-2 text-gray-900">Password</label>
                        <input type="password" name="password" id="login-password" placeholder="Masukkan password anda"
                            class="px-4 py-2 border-2 border-slate-300 rounded-md max-w-full focus:outline-none focus:border-hijau" required />
                    </div>
                    <button type="submit"
                        class="my-6 bg-primary hover:bg-hijau text-white font-medium text-lg px-4 py-2 rounded-md">
                        Login
                    </button>
                </form>
                <p class="text-gray-900">
                    Belum memiliki akun ?
                    <a href="{{ route('register.nasabah') }}" class="text-blue-500 font-bold underline" onclick="showRegister()">Register</a>
                </p>
                <p class="text-gray-900">
                    Lupa password?
                    <a href="#" class="text-blue-500 font-bold underline">Reset password</a>
                </p>
            </div>
            <!-- Image -->
            <div class="hidden lg:block lg:w-1/2 transition-transform transform" id="login-image">
                <img src="{{ asset('img/icon.png') }}" alt="Placeholder Image" class="h-full w-full object-cover" />
            </div>
        </div>
    </div>
</div>

@endsection