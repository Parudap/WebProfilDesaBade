<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\LayananKategori;
use App\Models\PengaturanWebsite;
use App\Models\ProfilDesa;

class LayananController extends Controller
{
    public function index()
    {
        $kategoris = LayananKategori::orderBy('urutan')->with(['items.syarat'])->get();

        $profil = ProfilDesa::getOrCreate();
        $brandLogo = PengaturanWebsite::get('logo_desa');

        $navItems = [
            ['label' => 'Home',        'href' => url('/'),          'route' => 'home'],
            ['label' => 'Profil Desa', 'href' => url('/profil'),    'route' => 'profil'],
            ['label' => 'Infografis',  'href' => url('/infografis'),'route' => 'infografis'],
            ['label' => 'Layanan',     'href' => url('/layanan'),   'route' => 'layanan'],
            ['label' => 'Berita',      'href' => url('/berita'),    'route' => 'berita*'],
            ['label' => 'Belanja',     'href' => url('/belanja'),   'route' => 'belanja'],
        ];

        return view('layanan', compact('kategoris', 'profil', 'brandLogo', 'navItems'));
    }
}
