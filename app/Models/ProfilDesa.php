<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $table = 'profil_desa';

    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'luas_wilayah',
        'jumlah_penduduk',
        'jumlah_kk',
        'koordinat',
        'embed_map_url',
        'map_link',
        'batas_utara',
        'batas_timur',
        'batas_selatan',
        'batas_barat',
        'land_details',
        'kas_desa',
        'pengairan',
    ];

    protected $casts = [
        'land_details' => 'array',
        'kas_desa' => 'array',
        'pengairan' => 'array',
    ];

    /**
     * Ambil profil desa (selalu hanya satu record).
     */
    public static function getOrCreate(): static
    {
        return static::firstOrCreate([], [
            'sejarah'        => '',
            'visi'           => '',
            'misi'           => '',
            'luas_wilayah'   => '',
            'batas_utara'    => '',
            'batas_timur'    => '',
            'batas_selatan'  => '',
            'batas_barat'    => '',
        ]);
    }
}
