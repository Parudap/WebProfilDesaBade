<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    protected $table = 'perangkat_desa';

    protected $fillable = [
        'nama',
        'jabatan',
        'pendidikan',
        'tipe',
        'foto',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    public function scopePerangkat($query)
    {
        return $query->where('tipe', 'perangkat');
    }

    public function scopeBpd($query)
    {
        return $query->where('tipe', 'bpd');
    }
}
