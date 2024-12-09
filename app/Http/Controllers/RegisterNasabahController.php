<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterNasabahController extends Controller
{
    public function showNasabahRegisterForm()
    {
        return view('tampilan_login.register-nasabah');
    }

    public function nasabahRegister(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|confirmed',    
        ]);
        Log::info('Registering user:', $request->all());

        $user = User::create([
            'nama' => $request->nama, 
            'alamat' => $request->alamat,
            'no_hp_wa' => $request->no_hp_wa, 
            'email' => $request->email,
            'password' => bcrypt($request->password), 
            'level' => 'Nasabah' 
        ]);

        Log::info('User registered successfully.', ['user_id' => $user->id]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
