<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Ganti dengan path tampilan login Anda
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect berdasarkan status verifikasi
            return redirect()->intended('dashboard'); // Ganti dengan rute dashboard Anda
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout(); // Menghapus sesi pengguna

    return redirect('/auth/login'); // Mengarahkan kembali ke halaman login
}

}
