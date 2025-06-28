<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mutasi;
use Illuminate\Support\Carbon;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'produk_lokasi_id' => 1,
                'tanggal' => Carbon::now()->subDays(3)->format('Y-m-d'),
                'jenis_mutasi' => 'masuk',
                'jumlah' => 10,
                'keterangan' => 'Penambahan stok awal',
            ],
            [
                'user_id' => 2,
                'produk_lokasi_id' => 2,
                'tanggal' => Carbon::now()->subDays(2)->format('Y-m-d'),
                'jenis_mutasi' => 'keluar',
                'jumlah' => 5,
                'keterangan' => 'Pengiriman barang ke customer',
            ],
            [
                'user_id' => 3,
                'produk_lokasi_id' => 3,
                'tanggal' => Carbon::now()->subDay()->format('Y-m-d'),
                'jenis_mutasi' => 'masuk',
                'jumlah' => 20,
                'keterangan' => 'Restock barang',
            ],
        ];

        foreach ($data as $item) {
            Mutasi::create($item);
        }
    }
}
