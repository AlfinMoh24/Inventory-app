<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MutasiResource extends JsonResource
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
            'tanggal' => $this->tanggal,
            'jenis_mutasi' => $this->jenis_mutasi,
            'jumlah' => $this->jumlah,
            'keterangan' => $this->keterangan ,

            'produk' => [
                'nama_produk' => $this->produkLokasi->produk->nama_produk,
                'kode_produk' => $this->produkLokasi->produk->kode_produk,
            ],

            'lokasi' => [
                'nama_lokasi' => $this->produkLokasi->lokasi->nama_lokasi,
                'kode_lokasi' => $this->produkLokasi->lokasi->kode_lokasi,
            ],

            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],

            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
