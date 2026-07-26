<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dusun extends Model
{
    protected $table = 'dusun';

    protected $fillable = [
        'nama',
        'slug',
        'jiwa',
        'kk',
        'laki',
        'perempuan',
        'percentage',
        'urutan',
    ];

    protected $casts = [
        'jiwa' => 'integer',
        'kk' => 'integer',
        'laki' => 'integer',
        'perempuan' => 'integer',
        'urutan' => 'integer',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->nama);
            }
        });
    }
}
