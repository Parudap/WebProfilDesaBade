<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananSyarat extends Model
{
    protected $table = 'layanan_syarat';

    protected $fillable = ['item_id', 'syarat', 'urutan'];

    public function item()
    {
        return $this->belongsTo(LayananItem::class, 'item_id');
    }
}
