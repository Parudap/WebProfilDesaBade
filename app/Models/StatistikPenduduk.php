<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    protected $table = 'statistik_penduduk';

    protected $fillable = [
        'kategori',
        'label',
        'value_laki',
        'value_perempuan',
        'urutan',
    ];

    protected $casts = [
        'value_laki' => 'integer',
        'value_perempuan' => 'integer',
        'urutan' => 'integer',
    ];

    public function getTotalAttribute(): int
    {
        return $this->value_laki + $this->value_perempuan;
    }

    public static function getByKategori(string $kategori): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('kategori', $kategori)->orderBy('urutan')->get();
    }
}
