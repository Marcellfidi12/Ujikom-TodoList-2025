<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth; // Pastikan menggunakan facades Auth

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan halaman registrasi
    public function showRegistrationForm()
    {
        return view('auth.register'); // Pastikan ada file view auth/register.blade.php
    }

    // Proses registrasi pengguna baru
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard
        return redirect('/dashboard');
    }
}
