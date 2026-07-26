<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apbdes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    protected $fillable = [
        'judul',
        'tahun',
        'file_pdf',
        'keterangan',
        'is_active',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('tahun', 'desc');
    }
}
