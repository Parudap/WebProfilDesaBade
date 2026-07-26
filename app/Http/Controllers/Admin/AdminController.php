<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            $user = auth()->user();
            if (! $user?->is_admin) {
                auth()->logout();
                return back()->withErrors(['email' => 'Akun ini tidak memiliki hak akses admin.']);
            }

            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalBerita = \App\Models\Berita::count();
        $totalProduk = \App\Models\ProdukBelanja::count();
        $totalPerangkat = \App\Models\PerangkatDesa::count();
        
        $totalPenduduk = \App\Models\StatistikPenduduk::where('kategori', 'usia')->sum('value_laki') 
                       + \App\Models\StatistikPenduduk::where('kategori', 'usia')->sum('value_perempuan');
                       
        if ($totalPenduduk == 0) {
            $profil = \App\Models\ProfilDesa::first();
            $totalPenduduk = $profil && $profil->jumlah_penduduk ? (int) str_replace([' Jiwa', '.'], '', $profil->jumlah_penduduk) : 4782;
        }

        return view('admin.dashboard', [
            'stats' => [
                'berita' => $totalBerita,
                'produk' => $totalProduk,
                'perangkat' => $totalPerangkat,
                'penduduk' => $totalPenduduk ?: 4782,
            ],
        ]);
    }
}
