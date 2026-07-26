<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image',
        'images',
        'author',
        'views',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
        'images' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
            if (empty($model->published_at)) {
                $model->published_at = now();
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('published_at', 'desc');
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->locale('id')->translatedFormat('d M Y')
            : '';
    }

    public function getFormattedDayAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->locale('id')->translatedFormat('d M')
            : '';
    }

    public function getFormattedYearAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->format('Y')
            : '';
    }

    public function getFormattedTimeAttribute(): string
    {
        return $this->published_at
            ? $this->published_at->format('H:i')
            : '';
    }
}
