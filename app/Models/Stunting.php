<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stunting extends Model
{
    use HasFactory;

    protected $table = 'infografis_stunting';

    protected $fillable = [
        'judul',
        'tahun',
        'file_pdf',
        'keterangan',
        'is_active',
        'jumlah_balita',
        'jumlah_stunting',
        'prevalensi',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'is_active' => 'boolean',
        'jumlah_balita' => 'integer',
        'jumlah_stunting' => 'integer',
        'prevalensi' => 'float',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('tahun', 'desc');
    }
}