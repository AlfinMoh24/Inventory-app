<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        if ($produk->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada produk ditemukan.',
            ]);
        }

        return response()->json([
            'message' => 'List of products',
            'data' => ProdukResource::collection($produk)
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kode_produk' => 'required|string|max:50|unique:produks',
            'kategori' => 'required|string|max:100',
            'satuan' => 'required|string|max:50',
        ]);

        // Simpan data
        $produk = Produk::create($validated);

        // Kembalikan response dengan resource
        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan',
            'data' => new ProdukResource($produk)
        ], 201);
    }

    public function show($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail produk',
            'data' => new ProdukResource($produk)
        ]);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        // Validasi input
        $validated = $request->validate([
            'nama_produk' => 'sometimes|required|string|max:255',
            'kode_produk' => 'sometimes|required|string|max:50|unique:produks,kode_produk,' . $id,
            'kategori' => 'sometimes|required|string|max:100',
            'satuan' => 'sometimes|required|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data
        $produk->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil diperbarui',
            'data' => new ProdukResource($produk)
        ]);
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'message' => 'Produk tidak ditemukan.',
            ], 404);
        }

        $produk->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus',
        ]);
    }

}
