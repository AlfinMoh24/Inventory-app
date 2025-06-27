<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'kode_produk',
        'kategori',
        'satuan',
        'deskripsi',
    ];

    // Relasi many-to-many ke Lokasi (via pivot)
    public function lokasi()
    {
        return $this->belongsToMany(Lokasi::class, 'produk_lokasi')
                    ->withPivot('stok')
                    ->withTimestamps();
    }

    // Relasi ke mutasi (via produk_lokasi_id di mutasi)
    // public function mutasi()
    // {
    //     return $this->hasMany(Mutasi::class);
    // }
}
