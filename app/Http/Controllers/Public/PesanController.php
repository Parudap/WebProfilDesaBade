<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller {
    public function store(Request $request) {
        $validated = $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'nullable|email|max:150',
            'subjek' => 'required|string|max:200',
            'pesan'  => 'required|string|max:2000',
        ], [
            'nama.required'   => 'Nama wajib diisi.',
            'subjek.required' => 'Subjek wajib diisi.',
            'pesan.required'  => 'Pesan wajib diisi.',
            'email.email'     => 'Format email tidak valid.',
        ]);
        Pesan::create($validated);
        return back()->with('kritik_success', 'Pesan Anda berhasil terkirim! Terima kasih atas kritik dan saran Anda.');
    }
}
