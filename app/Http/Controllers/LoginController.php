<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showNasabahLoginForm()
    {
        return view('tampilan_login.login');
    }

    public function loginNasabah(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            session(['user_level' => Auth::user()->level]);

            if (Auth::user()->level === 'Admin') {
                return redirect()->route('dashboard-admin');
            } else {
                return redirect()->route('dashboard-nasabah');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
