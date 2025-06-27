<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LokasiResource extends JsonResource
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
            'kode_lokasi' => $this->kode_lokasi,
            'nama_lokasi' => $this->nama_lokasi,
            'alamat' => $this->alamat,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];


    }
}
