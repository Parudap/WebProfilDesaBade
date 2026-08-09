<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDesa::perangkat()->orderBy('urutan')->get();
        return view('admin.perangkat-desa', compact('perangkat'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => ['required', 'string', 'max:100'],
            'jabatan'    => ['required', 'string', 'max:100'],
            'urutan'     => ['nullable', 'integer', 'min:0'],
            'foto'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
        ]);

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('perangkat', 'public');
            $data['foto'] = 'storage/' . $filePath;
        }

        PerangkatDesa::create($data + ['tipe' => 'perangkat', 'urutan' => $data['urutan'] ?? 0]);

        return redirect()->back()->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function update(Request $request, PerangkatDesa $perangkat)
    {
        $data = $request->validate([
            'nama'       => ['required', 'string', 'max:100'],
            'jabatan'    => ['required', 'string', 'max:100'],
            'urutan'     => ['nullable', 'integer', 'min:0'],
            'foto'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
        ]);

        if ($request->hasFile('foto')) {
            if ($perangkat->foto && str_starts_with($perangkat->foto, 'storage/')) {
                $cleanPath = substr($perangkat->foto, 8);
                \Illuminate\Support\Facades\Storage::disk('public')->delete($cleanPath);
            }
            $filePath = $request->file('foto')->store('perangkat', 'public');
            $data['foto'] = 'storage/' . $filePath;
        }

        $perangkat->update($data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        $perangkat->delete();
        return redirect()->route('admin.perangkat-desa')
            ->with('success', 'Data berhasil dihapus.');
    }
}