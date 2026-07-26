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
        $bpd       = PerangkatDesa::bpd()->orderBy('urutan')->get();
        return view('admin.perangkat-desa', compact('perangkat', 'bpd'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => ['required', 'string', 'max:100'],
            'jabatan'    => ['required', 'string', 'max:100'],
            'pendidikan' => ['nullable', 'string', 'max:100'],
            'tipe'       => ['required', 'in:perangkat,bpd'],
            'urutan'     => ['nullable', 'integer', 'min:0'],
        ]);

        PerangkatDesa::create($data + ['urutan' => $data['urutan'] ?? 0]);

        return redirect()->route('admin.perangkat-desa')
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function update(Request $request, PerangkatDesa $perangkat)
    {
        $data = $request->validate([
            'nama'       => ['required', 'string', 'max:100'],
            'jabatan'    => ['required', 'string', 'max:100'],
            'pendidikan' => ['nullable', 'string', 'max:100'],
            'tipe'       => ['required', 'in:perangkat,bpd'],
            'urutan'     => ['nullable', 'integer', 'min:0'],
        ]);

        $perangkat->update($data);

        return redirect()->route('admin.perangkat-desa')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        $perangkat->delete();
        return redirect()->route('admin.perangkat-desa')
            ->with('success', 'Data berhasil dihapus.');
    }
}