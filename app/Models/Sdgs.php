<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sdgs extends Model
{
    protected $table = 'infografis_sdgs';
    protected $fillable = ['tahun', 'goal_nomor', 'goal_nama', 'capaian'];
    protected $casts = ['tahun' => 'integer', 'goal_nomor' => 'integer', 'capaian' => 'float'];

    public static array $masterGoals = [
        1 => ['nama' => 'Desa Tanpa Kemiskinan', 'capaian' => 42.50, 'color' => '#E5243B', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/1-D1ogSllN.webp'],
        2 => ['nama' => 'Desa Tanpa Kelaparan', 'capaian' => 55.20, 'color' => '#DDA63A', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/2-DHeN7cNq.webp'],
        3 => ['nama' => 'Desa Sehat dan Sejahtera', 'capaian' => 78.40, 'color' => '#4C9F38', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/3-8DPdWVsr.webp'],
        4 => ['nama' => 'Pendidikan Desa Berkualitas', 'capaian' => 62.10, 'color' => '#C5192D', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/4-Dp0bLKhX.webp'],
        5 => ['nama' => 'Keterlibatan Perempuan Desa', 'capaian' => 68.30, 'color' => '#FF3A21', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/5-Dg-rxKrN.webp'],
        6 => ['nama' => 'Desa Layak Air Bersih dan Sanitasi', 'capaian' => 85.00, 'color' => '#26BDE2', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/6-CBjqaXey.webp'],
        7 => ['nama' => 'Desa Berenergi Bersih dan Terbarukan', 'capaian' => 72.80, 'color' => '#FCC30B', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/7-BztRCfpv.webp'],
        8 => ['nama' => 'Pertumbuhan Ekonomi Desa Merata', 'capaian' => 48.90, 'color' => '#A21942', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/8-BkVFrGRX.webp'],
        9 => ['nama' => 'Infrastruktur dan Inovasi Desa sesuai Kebutuhan', 'capaian' => 54.60, 'color' => '#FD6925', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/9-C5H-2m6b.webp'],
        10 => ['nama' => 'Desa Tanpa Kesenjangan', 'capaian' => 61.20, 'color' => '#DD1367', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/10-ZoKpU38q.webp'],
        11 => ['nama' => 'Kawasan Permukiman Desa Aman dan Nyaman', 'capaian' => 75.00, 'color' => '#FD9D24', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/11-CbkZL1Cc.webp'],
        12 => ['nama' => 'Konsumsi dan Produksi Desa Sadar Lingkungan', 'capaian' => 66.40, 'color' => '#BF8B2E', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/12-Dg_I54-p.webp'],
        13 => ['nama' => 'Desa Tanggap Perubahan Iklim', 'capaian' => 58.00, 'color' => '#3F7E44', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/13-Dz9ljOYY.webp'],
        14 => ['nama' => 'Desa Peduli Lingkungan Laut', 'capaian' => 0.00, 'color' => '#0A97D9', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/14-CMaWoc7g.webp'],
        15 => ['nama' => 'Desa Peduli Lingkungan Darat', 'capaian' => 64.20, 'color' => '#56C02B', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/15-BthY7CHy.webp'],
        16 => ['nama' => 'Desa Damai Berkeadilan', 'capaian' => 82.50, 'color' => '#00689D', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/16-BO6T2e_2.webp'],
        17 => ['nama' => 'Kemitraan untuk Pembangunan Desa', 'capaian' => 70.00, 'color' => '#19486A', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/17-BGkekl5X.webp'],
        18 => ['nama' => 'Kelembagaan Desa Dinamis dan Budaya Desa Adaptif', 'capaian' => 74.50, 'color' => '#00558A', 'image' => 'https://cdn.digitaldesa.com/statics/profil-v2/assets/18-Cngf8K_G.webp'],
    ];

    public static function seedDefaultsIfEmpty($tahun = null)
    {
        $tahun = $tahun ?: date('Y');
        if (self::where('tahun', $tahun)->count() < 18) {
            foreach (self::$masterGoals as $num => $data) {
                self::firstOrCreate(
                    ['tahun' => $tahun, 'goal_nomor' => $num],
                    [
                        'goal_nama' => $data['nama'],
                        'capaian'   => $data['capaian'],
                    ]
                );
            }
        }
    }
}