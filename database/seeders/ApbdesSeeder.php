<?php

namespace Database\Seeders;

use App\Models\Apbdes;
use Illuminate\Database\Seeder;

class ApbdesSeeder extends Seeder
{
    public function run(): void
    {
        Apbdes::updateOrCreate(
            ['tahun' => 2026],
            [
                'judul' => 'APBDes Desa Bade Tahun Anggaran 2026',
                'file_pdf' => 'apbdes/mock_apbdes_2026.pdf',
                'keterangan' => 'Dokumen Anggaran Pendapatan dan Belanja Desa Bade untuk Tahun Anggaran 2026.',
                'is_active' => true,
            ]
        );
    }
}
