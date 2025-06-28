<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokasi = [
            [
                'kode_lokasi' => 'LOC-001',
                'nama_lokasi' => 'Gudang Utama',
                'alamat' => 'Jl. Raya Industri No. 10, Malang',
            ],
            [
                'kode_lokasi' => 'LOC-002',
                'nama_lokasi' => 'Gudang Cabang',
                'alamat' => 'Jl. Veteran No. 5, Surabaya',
            ],
            [
                'kode_lokasi' => 'LOC-003',
                'nama_lokasi' => 'Toko Pusat',
                'alamat' => 'Jl. Diponegoro No. 88, Malang',
            ],
        ];

        foreach ($lokasi as $item) {
            Lokasi::create($item);
        }
    }
}
