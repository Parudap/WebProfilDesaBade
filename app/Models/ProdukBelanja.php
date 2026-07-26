<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class ProdukBelanja extends Model
{
    use HasFactory;

    protected $table = 'produk_belanja';

    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'whatsapp',
        'image',
        'images',
        'description',
        'rating',
        'rating_count',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'rating_count' => 'integer',
        'is_active' => 'boolean',
        'urutan' => 'integer',
        'images' => 'array',
    ];

    public function getCleanWhatsappAttribute(): string
    {
        $num = preg_replace('/[^0-9]/', '', $this->whatsapp ?: '085729001234');
        if (str_starts_with($num, '0')) {
            $num = '62' . substr($num, 1);
        }
        return $num;
    }

    public function getWaLinkAttribute(): string
    {
        $num = $this->clean_whatsapp;
        $msg = rawurlencode("Halo, saya tertarik pesan produk {$this->name} di Desa Bade.");
        return "https://wa.me/{$num}?text={$msg}";
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('urutan');
    }
}
