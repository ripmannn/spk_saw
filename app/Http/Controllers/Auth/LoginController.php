<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Import Validator

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Mengarahkan pengguna yang sudah login ke halaman home
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login'); // Kita akan membuat view ini nanti
    }

    /**
     * Menangani permintaan login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                        ->withErrors($validator)
                        ->withInput($request->only('email', 'remember'));
        }

        // 2. Mengambil kredensial dari request
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // Cek apakah checkbox "remember me" dicentang

        // 3. Mencoba untuk mengautentikasi pengguna
        if (Auth::attempt($credentials, $remember)) {
            // Jika autentikasi berhasil
            $request->session()->regenerate(); // Regenerasi session untuk keamanan
            return redirect()->intended(route('home')); // Redirect ke halaman tujuan atau home
        }

        // 4. Jika autentikasi gagal
        return redirect()->route('login')
            ->withErrors(['email' => 'Kredensial yang Anda masukkan tidak cocok dengan data kami.']) // Pesan error umum
            ->withInput($request->only('email', 'remember'));
    }

    /**
     * Melakukan logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Membatalkan session saat ini
        $request->session()->regenerateToken(); // Membuat ulang token CSRF

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}