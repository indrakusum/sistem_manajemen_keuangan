<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil hanya email dan password dari request
        $credentials = $request->only('email', 'password');

        // Cek apakah kredensial cocok dengan database
        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            // Redirection berdasarkan role pengguna
            if ($user->role == 'admin') {
                // return redirect()->route('user.dashboard');
                // return "tstt";
                return redirect('admin/dashboard');
            } elseif ($user->role == 'user') {
                // return redirect()->route('admin.dashboard');
                return "tsttsds";
            } else {
                // Jika role tidak cocok
                // Auth::logout();  // Logout untuk keamanan
                // return redirect('/login')->withErrors(['message' => 'Unauthorized access']);
                return "salah";
            }
        }

        // Debugging: Melihat apakah Auth::attempt() berhasil atau tidak
        // dd(Auth::attempt($credentials)); // Jika masih ada error, gunakan ini untuk melihat hasil

        // Jika kredensial salah, kembali ke halaman login dengan error
        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

