<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanStok;

class StokController extends Controller
{
    // Mendapatkan semua Stok
    public function index()
    {
        $catatanStok = CatatanStok::all();
        return response()->json([
            'message' => 'Berhasil mendapatkan stok',
            'data' => $catatanStok
        ]);
    }

    // Menyimpan Stok baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',

        ]);

        $catatanStok = CatatanStok::create($validatedData);

        return response()->json([
            'message' => 'Stok berhasil ditambahkan',
            'data' => $catatanStok
        ], 201);
    }

    // Mendapatkan Stok berdasarkan ID
    public function show($id)
    {
        $catatanStok = CatatanStok::find($id);
        if (!$catatanStok) {
            return response()->json(['message' => 'Stok tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Berhasil mendapatkan Stok',
            'data' => $catatanStok
        ]);
    }

    // Mengupdate Stok berdasarkan ID
    public function update(Request $request, $id)
    {
        $catatanStok = CatatanStok::find($id);
        if (!$catatanStok) {
            return response()->json(['message' => 'Stok tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'id_barang' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',

        ]);

        $catatanStok->update($validatedData);

        return response()->json([
            'message' => 'Stok berhasil diperbarui',
            'data' => $catatanStok
        ]);
    }

    // Menghapus Stok berdasarkan ID
    public function destroy($id)
    {
        $catatanStok = CatatanStok::find($id);
        if (!$catatanStok) {
            return response()->json(['message' => 'Stok tidak ditemukan'], 404);
        }

        $catatanStok->delete();

        return response()->json(['message' => 'Stok berhasil dihapus']);
    }
}
