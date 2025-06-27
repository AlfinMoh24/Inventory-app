<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukLokasi extends Model
{
    protected $table = 'produk_lokasi'; // pakai nama sesuai migration

    protected $fillable = [
        'produk_id',
        'lokasi_id',
        'stok',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function lokasi() 
    {
        return $this->belongsTo(Lokasi::class);
    }
}
