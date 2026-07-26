<?php

namespace Database\Seeders;

use App\Models\StatistikPenduduk;
use Illuminate\Database\Seeder;

class StatistikPendudukSeeder extends Seeder
{
    public function run(): void
    {
        StatistikPenduduk::truncate();

        $data = [
            // Kelompok Usia
            ['kategori' => 'usia', 'label' => '60+',   'value_laki' => 221, 'value_perempuan' => 270, 'urutan' => 1],
            ['kategori' => 'usia', 'label' => '55-59',  'value_laki' => 138, 'value_perempuan' => 133, 'urutan' => 2],
            ['kategori' => 'usia', 'label' => '50-54',  'value_laki' => 150, 'value_perempuan' => 138, 'urutan' => 3],
            ['kategori' => 'usia', 'label' => '45-49',  'value_laki' => 149, 'value_perempuan' => 132, 'urutan' => 4],
            ['kategori' => 'usia', 'label' => '40-44',  'value_laki' => 206, 'value_perempuan' => 172, 'urutan' => 5],
            ['kategori' => 'usia', 'label' => '35-39',  'value_laki' => 175, 'value_perempuan' => 193, 'urutan' => 6],
            ['kategori' => 'usia', 'label' => '30-34',  'value_laki' => 186, 'value_perempuan' => 156, 'urutan' => 7],
            ['kategori' => 'usia', 'label' => '25-29',  'value_laki' => 188, 'value_perempuan' => 200, 'urutan' => 8],
            ['kategori' => 'usia', 'label' => '20-24',  'value_laki' => 189, 'value_perempuan' => 180, 'urutan' => 9],
            ['kategori' => 'usia', 'label' => '15-19',  'value_laki' => 204, 'value_perempuan' => 185, 'urutan' => 10],
            ['kategori' => 'usia', 'label' => '10-14',  'value_laki' => 200, 'value_perempuan' => 164, 'urutan' => 11],
            ['kategori' => 'usia', 'label' => '5-9',    'value_laki' => 209, 'value_perempuan' => 160, 'urutan' => 12],
            ['kategori' => 'usia', 'label' => '0-4',    'value_laki' => 116, 'value_perempuan' => 136, 'urutan' => 13],

            // Pendidikan
            ['kategori' => 'pendidikan', 'label' => 'Tidak/Belum Sekolah',       'value_laki' => 88,  'value_perempuan' => 88,  'urutan' => 1],
            ['kategori' => 'pendidikan', 'label' => 'Belum Tamat SD/Sederajat',  'value_laki' => 102, 'value_perempuan' => 102, 'urutan' => 2],
            ['kategori' => 'pendidikan', 'label' => 'Tamat SD/Sederajat',        'value_laki' => 144, 'value_perempuan' => 144, 'urutan' => 3],
            ['kategori' => 'pendidikan', 'label' => 'SLTP/Sederajat',            'value_laki' => 70,  'value_perempuan' => 70,  'urutan' => 4],
            ['kategori' => 'pendidikan', 'label' => 'SLTA/Sederajat',            'value_laki' => 143, 'value_perempuan' => 142, 'urutan' => 5],
            ['kategori' => 'pendidikan', 'label' => 'Diploma I/II',              'value_laki' => 10,  'value_perempuan' => 11,  'urutan' => 6],
            ['kategori' => 'pendidikan', 'label' => 'Diploma III/Sarjana Muda',  'value_laki' => 7,   'value_perempuan' => 7,   'urutan' => 7],
            ['kategori' => 'pendidikan', 'label' => 'Diploma IV/Strata I',       'value_laki' => 13,  'value_perempuan' => 12,  'urutan' => 8],
            ['kategori' => 'pendidikan', 'label' => 'Strata II',                 'value_laki' => 1,   'value_perempuan' => 1,   'urutan' => 9],

            // Pekerjaan
            ['kategori' => 'pekerjaan', 'label' => 'Pelajar/Mahasiswa',       'value_laki' => 163, 'value_perempuan' => 162, 'urutan' => 1],
            ['kategori' => 'pekerjaan', 'label' => 'Belum/Tidak Bekerja',     'value_laki' => 137, 'value_perempuan' => 136, 'urutan' => 2],
            ['kategori' => 'pekerjaan', 'label' => 'Mengurus Rumah Tangga',   'value_laki' => 0,   'value_perempuan' => 271, 'urutan' => 3],
            ['kategori' => 'pekerjaan', 'label' => 'Karyawan Swasta',         'value_laki' => 63,  'value_perempuan' => 53,  'urutan' => 4],
            ['kategori' => 'pekerjaan', 'label' => 'Nelayan/Perikanan',       'value_laki' => 49,  'value_perempuan' => 0,   'urutan' => 5],
            ['kategori' => 'pekerjaan', 'label' => 'Petani/Pekebun',          'value_laki' => 25,  'value_perempuan' => 14,  'urutan' => 6],
            ['kategori' => 'pekerjaan', 'label' => 'Wiraswasta',              'value_laki' => 17,  'value_perempuan' => 10,  'urutan' => 7],

            // Agama
            ['kategori' => 'agama', 'label' => 'Islam',               'value_laki' => 578, 'value_perempuan' => 577, 'urutan' => 1],
            ['kategori' => 'agama', 'label' => 'Kristen',             'value_laki' => 0,   'value_perempuan' => 0,   'urutan' => 2],
            ['kategori' => 'agama', 'label' => 'Katolik',             'value_laki' => 0,   'value_perempuan' => 0,   'urutan' => 3],
            ['kategori' => 'agama', 'label' => 'Hindu',               'value_laki' => 0,   'value_perempuan' => 0,   'urutan' => 4],
            ['kategori' => 'agama', 'label' => 'Buddha',              'value_laki' => 0,   'value_perempuan' => 0,   'urutan' => 5],
            ['kategori' => 'agama', 'label' => 'Konghucu',            'value_laki' => 0,   'value_perempuan' => 0,   'urutan' => 6],

            // Status Perkawinan
            ['kategori' => 'perkawinan', 'label' => 'Belum Kawin',            'value_laki' => 310, 'value_perempuan' => 310, 'urutan' => 1],
            ['kategori' => 'perkawinan', 'label' => 'Kawin',                  'value_laki' => 229, 'value_perempuan' => 228, 'urutan' => 2],
            ['kategori' => 'perkawinan', 'label' => 'Cerai Mati',             'value_laki' => 34,  'value_perempuan' => 34,  'urutan' => 3],
            ['kategori' => 'perkawinan', 'label' => 'Kawin Tercatat',         'value_laki' => 3,   'value_perempuan' => 2,   'urutan' => 4],
            ['kategori' => 'perkawinan', 'label' => 'Cerai Hidup',            'value_laki' => 2,   'value_perempuan' => 2,   'urutan' => 5],

            // Data Pemilih
            ['kategori' => 'pemilih', 'label' => '2024', 'value_laki' => 402, 'value_perempuan' => 402, 'urutan' => 1],
            ['kategori' => 'pemilih', 'label' => '2025', 'value_laki' => 414, 'value_perempuan' => 414, 'urutan' => 2],
            ['kategori' => 'pemilih', 'label' => '2026', 'value_laki' => 427, 'value_perempuan' => 427, 'urutan' => 3],
        ];

        StatistikPenduduk::insert($data);
    }
}
