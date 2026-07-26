<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::getOrCreate();
        return view('admin.visi-misi', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'visi' => ['required', 'string', 'max:2000'],
            'misi' => ['required', 'string'],
        ], [
            'visi.required' => 'Visi tidak boleh kosong.',
            'misi.required' => 'Misi tidak boleh kosong.',
        ]);

        $profil = ProfilDesa::getOrCreate();
        $profil->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('admin.visi-misi')
            ->with('success', 'Visi & Misi berhasil diperbarui!');
    }
}