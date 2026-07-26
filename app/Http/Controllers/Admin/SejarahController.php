<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::getOrCreate();
        return view('admin.sejarah', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sejarah' => ['required', 'string', 'min:10'],
        ], [
            'sejarah.required' => 'Sejarah desa tidak boleh kosong.',
            'sejarah.min'      => 'Sejarah desa terlalu singkat (minimal 10 karakter).',
        ]);

        $profil = ProfilDesa::getOrCreate();
        $profil->update([
            'sejarah' => $request->sejarah,
        ]);

        return redirect()->route('admin.sejarah')
            ->with('success', 'Sejarah Desa berhasil diperbarui!');
    }
}