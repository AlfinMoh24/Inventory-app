<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            [
                'nama_produk' => 'Mouse Wireless',
                'kode_produk' => 'PRD-001',
                'kategori' => 'Perangkat Keras',
                'satuan' => 'Unit',
            ],
            [
                'nama_produk' => 'Keyboard Mechanical',
                'kode_produk' => 'PRD-002',
                'kategori' => 'Perangkat Keras',
                'satuan' => 'Unit',
            ],
            [
                'nama_produk' => 'Flashdisk 64GB',
                'kode_produk' => 'PRD-003',
                'kategori' => 'Aksesoris',
                'satuan' => 'Piece',
            ],
        ];

        foreach ($produk as $item) {
            Produk::create($item);
        }
    }
}
