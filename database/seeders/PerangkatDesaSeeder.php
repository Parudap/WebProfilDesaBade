<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerangkatDesaSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan dulu agar tidak duplikat
        DB::table('perangkat_desa')->truncate();

        // Perangkat Desa
        $perangkat = [
            ['jabatan' => 'Kepala Desa',               'nama' => 'Haryono',                'pendidikan' => 'SMA',  'tipe' => 'perangkat', 'urutan' => 1],
            ['jabatan' => 'Sekretaris Desa',            'nama' => 'Rifandaru Cahya Widhana','pendidikan' => 'S1',   'tipe' => 'perangkat', 'urutan' => 2],
            ['jabatan' => 'Kaur Keuangan',              'nama' => 'Prita Rahayu',           'pendidikan' => 'D3',   'tipe' => 'perangkat', 'urutan' => 3],
            ['jabatan' => 'Kaur Umum dan Perencanaan',  'nama' => 'Lilis Maesaroh',         'pendidikan' => 'SLTA', 'tipe' => 'perangkat', 'urutan' => 4],
            ['jabatan' => 'Kasi Pemerintahan',          'nama' => 'Noviyana',               'pendidikan' => 'S1',   'tipe' => 'perangkat', 'urutan' => 5],
            ['jabatan' => 'Kasi Kesra dan Pelayanan',   'nama' => 'Maryono',                'pendidikan' => 'SLTA', 'tipe' => 'perangkat', 'urutan' => 6],
            ['jabatan' => 'Kadus I',                    'nama' => 'Subadi',                 'pendidikan' => 'SLTA', 'tipe' => 'perangkat', 'urutan' => 7],
            ['jabatan' => 'Kadus II',                   'nama' => 'Haryanto',               'pendidikan' => 'SLTA', 'tipe' => 'perangkat', 'urutan' => 8],
            ['jabatan' => 'Kadus III',                  'nama' => 'Bejo',                   'pendidikan' => 'SLTA', 'tipe' => 'perangkat', 'urutan' => 9],
            ['jabatan' => 'Kadus IV',                   'nama' => 'Slamet Riyadi',          'pendidikan' => 'SLTA', 'tipe' => 'perangkat', 'urutan' => 10],
        ];

        // BPD
        $bpd = [
            ['jabatan' => 'Ketua',       'nama' => 'Sutardi',           'pendidikan' => 'SLTA', 'tipe' => 'bpd', 'urutan' => 1],
            ['jabatan' => 'Wakil Ketua', 'nama' => 'Sunardi',           'pendidikan' => 'S1',   'tipe' => 'bpd', 'urutan' => 2],
            ['jabatan' => 'Sekretaris',  'nama' => 'Setiyaningsih',     'pendidikan' => 'SLTA', 'tipe' => 'bpd', 'urutan' => 3],
            ['jabatan' => 'Anggota',     'nama' => 'Safrina Megasari',  'pendidikan' => 'SLTA', 'tipe' => 'bpd', 'urutan' => 4],
            ['jabatan' => 'Anggota',     'nama' => 'Dalimin',           'pendidikan' => 'SD',   'tipe' => 'bpd', 'urutan' => 5],
            ['jabatan' => 'Anggota',     'nama' => 'Hadi Muntaha',      'pendidikan' => 'SLTP', 'tipe' => 'bpd', 'urutan' => 6],
            ['jabatan' => 'Anggota',     'nama' => 'Mulyono',           'pendidikan' => 'SLTA', 'tipe' => 'bpd', 'urutan' => 7],
            ['jabatan' => 'Anggota',     'nama' => 'Hendy Setyawan',    'pendidikan' => 'SLTA', 'tipe' => 'bpd', 'urutan' => 8],
            ['jabatan' => 'Anggota',     'nama' => 'Sari Setyaningrum', 'pendidikan' => 'SLTP', 'tipe' => 'bpd', 'urutan' => 9],
        ];

        $now = now();
        $rows = [];

        foreach (array_merge($perangkat, $bpd) as $data) {
            $rows[] = array_merge($data, ['foto' => null, 'created_at' => $now, 'updated_at' => $now]);
        }

        DB::table('perangkat_desa')->insert($rows);
    }
}
