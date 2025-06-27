<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_produk' => $this->nama_produk,
            'kode_produk' => $this->kode_produk,
            'kategori' => $this->kategori,
            'satuan' => $this->satuan,
            'deskripsi' => $this->deskripsi,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }

}
