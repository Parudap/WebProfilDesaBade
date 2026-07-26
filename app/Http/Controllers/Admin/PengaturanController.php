<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaturanWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $settings = PengaturanWebsite::allAsArray();

        // Ambil default values jika kosong di db
        $defaults = [
            'nama_pemerintah_desa' => 'Pemerintah Desa Bade',
            'sub_pemerintah_desa' => 'Kecamatan Klego, Boyolali',
            'alamat_line_1' => 'Desa Bade, Kecamatan Klego,',
            'alamat_line_2' => 'Kabupaten Boyolali,',
            'alamat_line_3' => 'Provinsi Jawa Tengah, 57385',
            'kode_wilayah' => '33.09.12.2005',
            'telepon' => '0857-2900-1234',
            'email' => 'desa.bade@boyolali.go.id',
            'facebook' => '#',
            'instagram' => '#',
            'youtube' => '#',
            'tiktok' => '#',
            'telp_polisi' => '110',
            'telp_ambulans' => '118',
            'telp_pemadam' => '113',
            'telp_darurat' => '119',
            'telp_info' => '108',
            'logo_desa' => '',
            'hero_image_utama' => '',
            'hero_image_kedua' => '',
            'foto_kantor_desa' => '',
            'hero_image_1' => '',
            'hero_image_2' => '',
            'hero_image_3' => '',
            'hero_image_4' => '',
            'hero_image_5' => '',
        ];

        foreach ($defaults as $key => $default) {
            if (!isset($settings[$key])) {
                $settings[$key] = $default;
            }
        }

        return view('admin.pengaturan', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_pemerintah_desa' => ['required', 'string', 'max:255'],
            'sub_pemerintah_desa' => ['required', 'string', 'max:255'],
            'alamat_line_1' => ['required', 'string', 'max:255'],
            'alamat_line_2' => ['required', 'string', 'max:255'],
            'alamat_line_3' => ['required', 'string', 'max:255'],
            'kode_wilayah' => ['required', 'string', 'max:50'],
            'telepon' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'youtube' => ['nullable', 'string', 'max:255'],
            'tiktok' => ['nullable', 'string', 'max:255'],
            'telp_polisi' => ['required', 'string', 'max:50'],
            'telp_ambulans' => ['required', 'string', 'max:50'],
            'telp_pemadam' => ['required', 'string', 'max:50'],
            'telp_darurat' => ['required', 'string', 'max:50'],
            'telp_info' => ['required', 'string', 'max:50'],
            'logo_desa' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'hero_image_utama' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'hero_image_kedua' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'foto_kantor_desa' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
        ]);

        // List keys to save
        $keys = [
            'nama_pemerintah_desa',
            'sub_pemerintah_desa',
            'alamat_line_1',
            'alamat_line_2',
            'alamat_line_3',
            'kode_wilayah',
            'telepon',
            'email',
            'facebook',
            'instagram',
            'youtube',
            'tiktok',
            'telp_polisi',
            'telp_ambulans',
            'telp_pemadam',
            'telp_darurat',
            'telp_info',
        ];

        foreach ($keys as $key) {
            PengaturanWebsite::set($key, $request->input($key));
        }

        // Handle logo upload
        if ($request->hasFile('logo_desa')) {
            // Delete old logo if exists in storage
            $oldLogo = PengaturanWebsite::get('logo_desa');
            if ($oldLogo && str_starts_with($oldLogo, 'storage/')) {
                $cleanPath = substr($oldLogo, 8);
                Storage::disk('public')->delete($cleanPath);
            }

            $logoPath = $request->file('logo_desa')->store('pengaturan', 'public');
            PengaturanWebsite::set('logo_desa', 'storage/' . $logoPath);
        }

        // Handle other image uploads (utama, kedua, kantor)
        foreach (['hero_image_utama', 'hero_image_kedua', 'foto_kantor_desa'] as $fileKey) {
            if ($request->hasFile($fileKey)) {
                $oldFile = PengaturanWebsite::get($fileKey);
                if ($oldFile && str_starts_with($oldFile, 'storage/')) {
                    $cleanPath = substr($oldFile, 8);
                    Storage::disk('public')->delete($cleanPath);
                }

                $filePath = $request->file($fileKey)->store('pengaturan', 'public');
                PengaturanWebsite::set($fileKey, 'storage/' . $filePath);
            }
        }

        return redirect()->route('admin.pengaturan')->with('success', 'Pengaturan Website & Footer berhasil diperbarui!');
    }

    public function beranda()
    {
        $settings = PengaturanWebsite::allAsArray();

        $defaults = [
            'hero_image_1' => '',
            'hero_image_2' => '',
            'hero_image_3' => '',
            'hero_image_4' => '',
            'hero_image_5' => '',
        ];

        foreach ($defaults as $key => $default) {
            if (!isset($settings[$key])) {
                $settings[$key] = $default;
            }
        }

        return view('admin.beranda', compact('settings'));
    }

    public function berandaUpdate(Request $request)
    {
        $request->validate([
            'hero_image_1' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
            'hero_image_2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
            'hero_image_3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
            'hero_image_4' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
            'hero_image_5' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $fileKey = "hero_image_{$i}";

            // Handle delete if requested
            if ($request->input("delete_hero_image_{$i}") == '1') {
                $oldFile = PengaturanWebsite::get($fileKey);
                if ($oldFile && str_starts_with($oldFile, 'storage/')) {
                    $cleanPath = substr($oldFile, 8);
                    Storage::disk('public')->delete($cleanPath);
                }
                PengaturanWebsite::set($fileKey, 'none');
            }

            // Handle file upload
            if ($request->hasFile($fileKey)) {
                $oldFile = PengaturanWebsite::get($fileKey);
                if ($oldFile && str_starts_with($oldFile, 'storage/')) {
                    $cleanPath = substr($oldFile, 8);
                    Storage::disk('public')->delete($cleanPath);
                }

                $filePath = $request->file($fileKey)->store('pengaturan', 'public');
                PengaturanWebsite::set($fileKey, 'storage/' . $filePath);
            }
        }

        return redirect()->route('admin.beranda')->with('success', 'Slide Hero Beranda berhasil diperbarui!');
    }
}
