<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukLokasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'produk_id' => $this->produk_id,
            'lokasi_id' => $this->lokasi_id,
            'stok' => $this->stok,

            // data produk
            'produk' => [
                'nama_produk' => $this->produk->nama_produk,
                'kode_produk' => $this->produk->kode_produk,
                'kategori' => $this->produk->kategori,
                'satuan' => $this->produk->satuan,
            ],

            // data lokasi
            'lokasi' => [
                'nama_lokasi' => $this->lokasi->nama_lokasi,
                'kode_lokasi' => $this->lokasi->kode_lokasi,
                'alamat' => $this->lokasi->alamat,
            ],

            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
