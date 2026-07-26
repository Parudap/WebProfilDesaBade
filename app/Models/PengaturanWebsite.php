<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PengaturanWebsite extends Model
{
    protected $table = 'pengaturan_website';

    protected $fillable = [
        'key',
        'value',
        'label',
        'group',
        'type',
    ];

    /**
     * Ambil nilai pengaturan berdasarkan key, dengan nilai default.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set nilai pengaturan berdasarkan key.
     */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    /**
     * Ambil semua pengaturan dalam satu grup sebagai array key=>value.
     */
    public static function getGroup(string $group): array
    {
        return static::where('group', $group)
            ->pluck('value', 'key')
            ->toArray();
    }

    /**
     * Ambil semua pengaturan sebagai array key=>value.
     */
    public static function all($columns = ['*']): \Illuminate\Database\Eloquent\Collection
    {
        return parent::all($columns);
    }

    public static function allAsArray(): array
    {
        return static::query()->pluck('value', 'key')->toArray();
    }
}
