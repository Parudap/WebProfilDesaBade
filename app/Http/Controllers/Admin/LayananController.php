<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananKategori;
use App\Models\LayananItem;
use App\Models\LayananSyarat;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $kategoris = LayananKategori::orderBy('urutan')->with(['items.syarat'])->get();
        return view('admin.layanan', compact('kategoris'));
    }

    // ── Kategori ──────────────────────────────────────────────

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama'    => ['required', 'string', 'max:255'],
            'catatan' => ['nullable', 'string'],
        ]);

        $maxUrutan = LayananKategori::max('urutan') ?? 0;

        LayananKategori::create([
            'nama'    => $request->nama,
            'catatan' => $request->catatan,
            'urutan'  => $maxUrutan + 1,
        ]);

        return back()->with('success', 'Kategori layanan berhasil ditambahkan!');
    }

    public function updateKategori(Request $request, LayananKategori $kategori)
    {
        $request->validate([
            'nama'    => ['required', 'string', 'max:255'],
            'catatan' => ['nullable', 'string'],
        ]);

        $kategori->update([
            'nama'    => $request->nama,
            'catatan' => $request->catatan,
        ]);

        return back()->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroyKategori(LayananKategori $kategori)
    {
        $kategori->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }

    // ── Item Layanan ──────────────────────────────────────────

    public function storeItem(Request $request)
    {
        $request->validate([
            'kategori_id' => ['required', 'exists:layanan_kategori,id'],
            'nama'        => ['required', 'string', 'max:255'],
        ]);

        $maxUrutan = LayananItem::where('kategori_id', $request->kategori_id)->max('urutan') ?? 0;

        LayananItem::create([
            'kategori_id' => $request->kategori_id,
            'nama'        => $request->nama,
            'urutan'      => $maxUrutan + 1,
        ]);

        return back()->with('success', 'Item layanan berhasil ditambahkan!');
    }

    public function updateItem(Request $request, LayananItem $item)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        $item->update(['nama' => $request->nama]);

        return back()->with('success', 'Item layanan berhasil diperbarui!');
    }

    public function destroyItem(LayananItem $item)
    {
        $item->delete();
        return back()->with('success', 'Item layanan berhasil dihapus.');
    }

    // ── Syarat ───────────────────────────────────────────────

    public function storeSyarat(Request $request)
    {
        $request->validate([
            'item_id' => ['required', 'exists:layanan_item,id'],
            'syarat'  => ['required', 'string', 'max:500'],
        ]);

        $maxUrutan = LayananSyarat::where('item_id', $request->item_id)->max('urutan') ?? 0;

        LayananSyarat::create([
            'item_id' => $request->item_id,
            'syarat'  => $request->syarat,
            'urutan'  => $maxUrutan + 1,
        ]);

        return back()->with('success', 'Syarat berhasil ditambahkan!');
    }

    public function updateSyarat(Request $request, LayananSyarat $syarat)
    {
        $request->validate([
            'syarat' => ['required', 'string', 'max:500'],
        ]);

        $syarat->update(['syarat' => $request->syarat]);

        return back()->with('success', 'Syarat berhasil diperbarui!');
    }

    public function destroySyarat(LayananSyarat $syarat)
    {
        $syarat->delete();
        return back()->with('success', 'Syarat berhasil dihapus.');
    }
}
