<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananItem extends Model
{
    protected $table = 'layanan_item';

    protected $fillable = ['kategori_id', 'nama', 'urutan'];

    public function kategori()
    {
        return $this->belongsTo(LayananKategori::class, 'kategori_id');
    }

    public function syarat()
    {
        return $this->hasMany(LayananSyarat::class, 'item_id')->orderBy('urutan');
    }
}
