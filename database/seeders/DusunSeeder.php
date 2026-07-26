<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    public function run(): void
    {
        $dusun = [
            ['nama' => 'Wates Barat', 'slug' => 'wates-barat', 'jiwa' => 949,  'kk' => 316, 'laki' => 492, 'perempuan' => 457, 'percentage' => '19.85%', 'urutan' => 1],
            ['nama' => 'Wates Timur', 'slug' => 'wates-timur', 'jiwa' => 1178, 'kk' => 383, 'laki' => 636, 'perempuan' => 542, 'percentage' => '24.63%', 'urutan' => 2],
            ['nama' => 'Pelang',      'slug' => 'pelang',       'jiwa' => 1917, 'kk' => 641, 'laki' => 962, 'perempuan' => 955, 'percentage' => '40.09%', 'urutan' => 3],
            ['nama' => 'Bade',        'slug' => 'bade',         'jiwa' => 738,  'kk' => 262, 'laki' => 367, 'perempuan' => 371, 'percentage' => '15.43%', 'urutan' => 4],
        ];

        foreach ($dusun as $item) {
            Dusun::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
