<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProdukLokasi;

class ProdukLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'produk_id' => 1,
                'lokasi_id' => 1,
                'stok' => 50,
            ],
            [
                'produk_id' => 1,
                'lokasi_id' => 2,
                'stok' => 30,
            ],
            [
                'produk_id' => 2,
                'lokasi_id' => 1,
                'stok' => 40,
            ],
            [
                'produk_id' => 3,
                'lokasi_id' => 3,
                'stok' => 100,
            ],
        ];

        foreach ($data as $item) {
            ProdukLokasi::create($item);
        }
    }
}
