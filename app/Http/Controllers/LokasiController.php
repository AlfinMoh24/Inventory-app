<?php

namespace App\Http\Controllers;

use App\Http\Resources\LokasiResource;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $produk = Lokasi::all();
        if ($produk->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(
            [
                'message' => 'Data lokasi ditemukan',
                'data' => LokasiResource::collection($produk)
            ]
        );
    }

    public function show($id)
    {
        $lokasi = Lokasi::find($id);
        if (!$lokasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(
            [
                'message' => 'Data lokasi ditemukan',
                'data' => new LokasiResource($lokasi)
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|string|max:255|unique:lokasis,kode_lokasi',
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::create($request->all());

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Data lokasi berhasil dibuat',
                'data' => new LokasiResource($lokasi)
            ],
            201
        );
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::find($id);
        if (!$lokasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'kode_lokasi' => 'sometimes|required|string|max:255',
            'nama_lokasi' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string|max:255',
        ]);

        $lokasi->update($request->all());

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Data lokasi berhasil diperbarui',
                'data' => new LokasiResource($lokasi)
            ]
        );
    }
    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        if (!$lokasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $lokasi->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data lokasi berhasil dihapus']);
    }
}
