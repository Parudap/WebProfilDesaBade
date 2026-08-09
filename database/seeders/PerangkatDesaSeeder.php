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
            ['jabatan' => 'Kepala Desa',               'nama' => 'Haryono',                'tipe' => 'perangkat', 'urutan' => 1, 'foto' => 'images/kepala-desa.jpg'],
            ['jabatan' => 'Sekretaris Desa',            'nama' => 'Rifandaru Cahya Widhana','tipe' => 'perangkat', 'urutan' => 2, 'foto' => 'images/perangkat/rifandaru-cahya-widhana.png'],
            ['jabatan' => 'Kaur Keuangan',              'nama' => 'Prita Rahayu',           'tipe' => 'perangkat', 'urutan' => 3, 'foto' => 'images/perangkat/prita-rahayu.png'],
            ['jabatan' => 'Kaur Umum dan Perencanaan',  'nama' => 'Lilis Maesaroh',         'tipe' => 'perangkat', 'urutan' => 4, 'foto' => 'images/perangkat/lilis-maesaroh.png'],
            ['jabatan' => 'Kasi Pemerintahan',          'nama' => 'Noviyana',               'tipe' => 'perangkat', 'urutan' => 5, 'foto' => 'images/perangkat/noviyana.png'],
            ['jabatan' => 'Kasi Kesra dan Pelayanan',   'nama' => 'Maryono',                'tipe' => 'perangkat', 'urutan' => 6, 'foto' => 'images/perangkat/maryono.png'],
            ['jabatan' => 'Kadus I',                    'nama' => 'Subadi',                 'tipe' => 'perangkat', 'urutan' => 7, 'foto' => 'images/perangkat/subadi.png'],
            ['jabatan' => 'Kadus II',                   'nama' => 'Haryanto',               'tipe' => 'perangkat', 'urutan' => 8, 'foto' => 'images/perangkat/haryanto.png'],
            ['jabatan' => 'Kadus III',                  'nama' => 'Bejo',                   'tipe' => 'perangkat', 'urutan' => 9, 'foto' => 'images/perangkat/bejo.png'],
            ['jabatan' => 'Kadus IV',                   'nama' => 'Slamet Riyadi',          'tipe' => 'perangkat', 'urutan' => 10, 'foto' => 'images/perangkat/slamet-riyadi.png'],
        ];

        $now = now();
        $rows = [];

        foreach ($perangkat as $data) {
            $rows[] = array_merge($data, ['created_at' => $now, 'updated_at' => $now]);
        }

        DB::table('perangkat_desa')->insert($rows);
    }
}
