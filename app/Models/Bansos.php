<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'infografis_bansos';

    protected $fillable = [
        'judul',
        'nama_program',
        'tahun',
        'file_pdf',
        'jumlah_penerima',
        'anggaran',
        'keterangan',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'jumlah_penerima' => 'integer',
        'urutan' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('tahun', 'desc');
    }
}