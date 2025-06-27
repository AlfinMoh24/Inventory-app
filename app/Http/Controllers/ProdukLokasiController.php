<?php

namespace App\Http\Controllers;

use App\Models\ProdukLokasi;
use App\Http\Resources\ProdukLokasiResource;
use Illuminate\Http\Request;

class ProdukLokasiController extends Controller
{
    // 🔹 List semua stok produk di semua lokasi
    public function index()
    {

        $data = ProdukLokasi::with('produk', 'lokasi')->get();
        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data stok produk di lokasi manapun'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar stok produk di semua lokasi',
            'data' => ProdukLokasiResource::collection($data)
        ]);
    }

    // 🔹 Tambah atau update stok
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'stok' => 'required|integer|min:0',
        ]);

        // Update jika sudah ada, buat baru jika belum
        $produkLokasi = ProdukLokasi::updateOrCreate(
            [
                'produk_id' => $validated['produk_id'],
                'lokasi_id' => $validated['lokasi_id'],
            ],
            ['stok' => $validated['stok']]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Stok berhasil disimpan',
            'data' => new ProdukLokasiResource($produkLokasi->load('produk', 'lokasi'))
        ], 201);
    }

    // 🔹 Tampilkan detail stok tertentu
    public function show($id)
    {
        $data = ProdukLokasi::with('produk', 'lokasi')->find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail stok ditemukan',
            'data' => new ProdukLokasiResource($data)
        ]);
    }

    public function update(Request $request, $id)
    {
        $produkLokasi = ProdukLokasi::find($id);
        if (!$produkLokasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'stok' => 'required|integer|min:0',
        ]);

        $produkLokasi->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Stok produk di lokasi berhasil diperbarui',
            'data' => new ProdukLokasiResource($produkLokasi->load('produk', 'lokasi'))
        ]);
    }

    public function destroy($id)
    {
        $produkLokasi = ProdukLokasi::find($id);
        if (!$produkLokasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $produkLokasi->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Stok produk di lokasi berhasil dihapus'
        ]);
    }
}
