<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi',
        'alamat',
    ];

    // Relasi many-to-many ke Produk
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_lokasi')
                    ->withPivot('stok')
                    ->withTimestamps();
    }
}

