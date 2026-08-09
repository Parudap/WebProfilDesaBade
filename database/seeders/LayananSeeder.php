<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('layanan_syarat')->delete();
        DB::table('layanan_item')->delete();
        DB::table('layanan_kategori')->delete();

        $data = [
            [
                'nama'    => 'Administrasi Surat Menyurat',
                'catatan' => 'Semua bentuk dokumen fotocopy dalam bentuk dokumen berwarna.',
                'urutan'  => 1,
                'items'   => [
                    [
                        'nama'    => 'Surat Pengantar Umum',
                        'urutan'  => 1,
                        'syarat'  => ['Fotocopy KK', 'Fotocopy KTP'],
                    ],
                    [
                        'nama'    => 'Surat Keterangan Umum',
                        'urutan'  => 2,
                        'syarat'  => ['Fotocopy KK', 'Fotocopy KTP'],
                    ],
                    [
                        'nama'    => 'Surat Keterangan Tidak Mampu (SKTM)',
                        'urutan'  => 3,
                        'syarat'  => ['Fotocopy KK', 'Fotocopy KTP'],
                    ],
                    [
                        'nama'    => 'Surat Keterangan Domisili Tempat Tinggal',
                        'urutan'  => 4,
                        'syarat'  => ['FC. KK', 'FC. KTP'],
                    ],
                    [
                        'nama'    => 'Surat Keterangan Usaha',
                        'urutan'  => 5,
                        'syarat'  => ['FC. KK', 'FC. KTP'],
                    ],
                ],
            ],
            [
                'nama'    => 'Administrasi Kependudukan',
                'catatan' => null,
                'urutan'  => 2,
                'items'   => [
                    [
                        'nama'   => 'Pembuatan KTP',
                        'urutan' => 1,
                        'syarat' => ['FC. KK', 'FC. Akte Kelahiran'],
                    ],
                    [
                        'nama'   => 'Pembuatan KK Baru / Pembaharuan Data',
                        'urutan' => 2,
                        'syarat' => [
                            'KK Asli',
                            'FC. Surat Nikah',
                            'FC. Ijazah / SK Pengangkatan / SK Pensiun',
                            'KTP Asli apabila terdapat perubahan elemen data',
                        ],
                    ],
                    [
                        'nama'   => 'Akta Kelahiran',
                        'urutan' => 3,
                        'syarat' => [
                            'Surat Keterangan Kelahiran Asli dari RS / Puskesmas / Rumah Bersalin',
                            'KK Asli',
                            'FC. KTP kedua orang tua bayi',
                            'FC. Surat Nikah',
                            'FC. KTP saksi 2 orang',
                            'Apabila jarak kelahiran diatas 5th dari anak terakhir, wajib membawa materai 10.000, 2 lembar',
                        ],
                    ],
                    [
                        'nama'   => 'Akta Kematian',
                        'urutan' => 4,
                        'syarat' => [
                            'KTP Asli YBS dan Pasangan Suami/Istri',
                            'KK Asli YBS',
                            'Materai 2 lembar',
                            'FC. KTP Ahli Waris',
                            'Surat Keterangan Kematian dari RS',
                            'FC. KTP saksi 2 orang',
                        ],
                    ],
                    [
                        'nama'   => 'Pindah Datang',
                        'urutan' => 5,
                        'syarat' => [
                            'SKP WNI',
                            'KTP Asli',
                            'FC. Akta Kelahiran',
                            'FC. Buku Nikah',
                        ],
                    ],
                    [
                        'nama'   => 'Pindah Keluar',
                        'urutan' => 6,
                        'syarat' => [
                            'FC. KTP',
                            'FC. Surat Nikah',
                            'KK Asli',
                        ],
                    ],
                ],
            ],
        ];

        foreach ($data as $kategoriData) {
            $items = $kategoriData['items'];
            unset($kategoriData['items']);

            $kategoriId = DB::table('layanan_kategori')->insertGetId([
                'nama'       => $kategoriData['nama'],
                'catatan'    => $kategoriData['catatan'],
                'urutan'     => $kategoriData['urutan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($items as $itemData) {
                $syaratList = $itemData['syarat'];
                unset($itemData['syarat']);

                $itemId = DB::table('layanan_item')->insertGetId([
                    'kategori_id' => $kategoriId,
                    'nama'        => $itemData['nama'],
                    'urutan'      => $itemData['urutan'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);

                foreach ($syaratList as $idx => $syarat) {
                    DB::table('layanan_syarat')->insert([
                        'item_id'    => $itemId,
                        'syarat'     => $syarat,
                        'urutan'     => $idx + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
