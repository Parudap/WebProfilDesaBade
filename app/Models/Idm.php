<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idm extends Model
{
    use HasFactory;

    protected $table = 'infografis_idm';

    protected $fillable = [
        'judul',
        'tahun',
        'file_pdf',
        'keterangan',
        'is_active',
        'skor_ikl',
        'skor_iks',
        'skor_ike',
        'skor_idm',
        'status_idm',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'is_active' => 'boolean',
        'skor_ikl' => 'float',
        'skor_iks' => 'float',
        'skor_ike' => 'float',
        'skor_idm' => 'float',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('tahun', 'desc');
    }
}