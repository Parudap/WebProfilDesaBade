<?php

namespace Database\Seeders;

use App\Models\PengaturanWebsite;
use Illuminate\Database\Seeder;

class PengaturanWebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'nama_desa',        'value' => 'Bade',             'label' => 'Nama Desa',          'group' => 'umum',    'type' => 'text'],
            ['key' => 'nama_kecamatan',   'value' => 'Klego',            'label' => 'Kecamatan',          'group' => 'umum',    'type' => 'text'],
            ['key' => 'nama_kabupaten',   'value' => 'Boyolali',         'label' => 'Kabupaten',          'group' => 'umum',    'type' => 'text'],
            ['key' => 'nama_provinsi',    'value' => 'Jawa Tengah',      'label' => 'Provinsi',           'group' => 'umum',    'type' => 'text'],
            ['key' => 'nama_pemerintah_desa', 'value' => 'Pemerintah Desa Bade', 'label' => 'Nama Pemerintah Desa', 'group' => 'umum', 'type' => 'text'],
            ['key' => 'sub_pemerintah_desa',  'value' => 'Kecamatan Klego, Boyolali', 'label' => 'Sub-header Pemerintah', 'group' => 'umum', 'type' => 'text'],
            ['key' => 'hero_title_top',   'value' => 'Portal Informasi', 'label' => 'Hero Judul Atas',    'group' => 'hero',    'type' => 'text'],
            ['key' => 'hero_title_bottom','value' => 'Desa Bade',        'label' => 'Hero Judul Bawah',   'group' => 'hero',    'type' => 'text'],
            ['key' => 'hero_copy',        'value' => '',                 'label' => 'Hero Deskripsi',     'group' => 'hero',    'type' => 'textarea'],
            ['key' => 'alamat',           'value' => 'Desa Bade, Kecamatan Klego, Kabupaten Boyolali, Jawa Tengah', 'label' => 'Alamat Lengkap', 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'alamat_line_1',    'value' => 'Desa Bade, Kecamatan Klego,', 'label' => 'Alamat Baris 1', 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'alamat_line_2',    'value' => 'Kabupaten Boyolali,', 'label' => 'Alamat Baris 2', 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'alamat_line_3',    'value' => 'Provinsi Jawa Tengah, 57385', 'label' => 'Alamat Baris 3', 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'kode_wilayah',     'value' => '33.09.12.2005',     'label' => 'Kode Wilayah',       'group' => 'kontak', 'type' => 'text'],
            ['key' => 'telepon',          'value' => '0857-2900-1234',    'label' => 'Telepon',            'group' => 'kontak',  'type' => 'text'],
            ['key' => 'email',            'value' => 'desa.bade@boyolali.go.id', 'label' => 'Email',        'group' => 'kontak',  'type' => 'text'],
            ['key' => 'facebook',         'value' => '#',                 'label' => 'Facebook',           'group' => 'sosmed',  'type' => 'url'],
            ['key' => 'instagram',        'value' => '#',                 'label' => 'Instagram',          'group' => 'sosmed',  'type' => 'url'],
            ['key' => 'youtube',          'value' => '#',                 'label' => 'YouTube',            'group' => 'sosmed',  'type' => 'url'],
            ['key' => 'tiktok',           'value' => '#',                 'label' => 'TikTok',             'group' => 'sosmed',  'type' => 'url'],
            ['key' => 'telp_polisi',      'value' => '110',               'label' => 'No Telp Polisi',     'group' => 'darurat', 'type' => 'text'],
            ['key' => 'telp_ambulans',    'value' => '118',               'label' => 'No Telp Ambulans',   'group' => 'darurat', 'type' => 'text'],
            ['key' => 'telp_pemadam',     'value' => '113',               'label' => 'No Telp Pemadam',    'group' => 'darurat', 'type' => 'text'],
            ['key' => 'telp_darurat',     'value' => '119',               'label' => 'No Telp Darurat',    'group' => 'darurat', 'type' => 'text'],
            ['key' => 'telp_info',        'value' => '108',               'label' => 'No Telp Info',       'group' => 'darurat', 'type' => 'text'],
            ['key' => 'seo_title',        'value' => 'Desa Bade – Portal Informasi Desa', 'label' => 'SEO Title', 'group' => 'seo', 'type' => 'text'],
            ['key' => 'seo_description',  'value' => 'Portal informasi resmi Desa Bade, Kecamatan Klego, Kabupaten Boyolali. Temukan berita, data statistik, dan potensi desa.', 'label' => 'Meta Deskripsi', 'group' => 'seo', 'type' => 'textarea'],
            ['key' => 'seo_keywords',     'value' => 'desa bade, klego, boyolali, profil desa, portal desa', 'label' => 'Keywords', 'group' => 'seo', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            PengaturanWebsite::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
