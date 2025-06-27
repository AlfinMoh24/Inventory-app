<?php

namespace App\Http\Controllers;

use App\Http\Resources\MutasiResource;
use App\Models\Mutasi;
use App\Models\ProdukLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasi = Mutasi::all();
        if ($mutasi->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json([
            'message' => 'Data mutasi ditemukan',
            'data' => MutasiResource::collection($mutasi)
        ]);

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_lokasi_id' => 'required|exists:produk_lokasi,id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string',
        ], [
            'jenis_mutasi.in' => 'Jenis mutasi harus masuk atau keluar.'
        ]);

        $produkLokasi = ProdukLokasi::findOrFail($validated['produk_lokasi_id']);

        // Hitung stok baru
        if ($validated['jenis_mutasi'] === 'masuk') {
            $produkLokasi->stok += $validated['jumlah'];
        } else {
            if ($produkLokasi->stok < $validated['jumlah']) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Stok tidak mencukupi untuk mutasi keluar'
                ], 400);
            }
            $produkLokasi->stok -= $validated['jumlah'];
        }

        $produkLokasi->save();

        $mutasi = Mutasi::create([
            'user_id' => Auth::id(),
            'produk_lokasi_id' => $validated['produk_lokasi_id'],
            'tanggal' => $validated['tanggal'],
            'jenis_mutasi' => $validated['jenis_mutasi'],
            'jumlah' => $validated['jumlah'],
            'keterangan' => $validated['keterangan'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Mutasi berhasil dicatat',
            'data' => new MutasiResource($mutasi)
        ], 201);
    }

    public function show($id)
    {
        $mutasi = Mutasi::find($id);
        if (!$mutasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json([
            'message' => 'Data mutasi ditemukan',
            'data' => new MutasiResource($mutasi)
        ]);
    }

    public function update(Request $request, $id)
    {
        $mutasi = Mutasi::find($id);
        if (!$mutasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'tanggal' => 'sometimes|required|date',
            'jenis_mutasi' => 'sometimes|required|in:masuk,keluar',
            'jumlah' => 'sometimes|required|integer|min:1',
            'keterangan' => 'sometimes|required|string',
        ], [
            'jenis_mutasi.in' => 'Jenis mutasi harus masuk atau keluar.'
        ]);

        // Update produk lokasi stok
        $produkLokasi = $mutasi->produkLokasi;
        if (isset($validated['jenis_mutasi']) && isset($validated['jumlah'])) {
            if ($validated['jenis_mutasi'] === 'masuk') {
                $produkLokasi->stok += $validated['jumlah'];
            } else {
                if ($produkLokasi->stok < $validated['jumlah']) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Stok tidak mencukupi untuk mutasi keluar'
                    ], 400);
                }
                $produkLokasi->stok -= $validated['jumlah'];
            }
            $produkLokasi->save();
        }

        // Update mutasi
        $mutasi->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Mutasi berhasil diperbarui',
            'data' => new MutasiResource($mutasi)
        ]);
    }

    public function destroy($id)
    {
        $mutasi = Mutasi::find($id);
        if (!$mutasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Update produk lokasi stok
        $produkLokasi = $mutasi->produkLokasi;
        if ($mutasi->jenis_mutasi === 'masuk') {
            $produkLokasi->stok -= $mutasi->jumlah;
        } else {
            $produkLokasi->stok += $mutasi->jumlah;
        }
        $produkLokasi->save();

        $mutasi->delete();

        return response()->json(['message' => 'Data mutasi berhasil dihapus']);
    }
}
