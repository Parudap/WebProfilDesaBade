<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananKategori extends Model
{
    protected $table = 'layanan_kategori';

    protected $fillable = ['nama', 'catatan', 'urutan'];

    public function items()
    {
        return $this->hasMany(LayananItem::class, 'kategori_id')->orderBy('urutan');
    }
}
