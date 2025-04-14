<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Mendapatkan semua barang
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return response()->json([
            'message' => 'Berhasil mendapatkan daftar barang',
            'data' => $barang
        ]);
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'nama_barang' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $barang = Barang::create($validatedData);

        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
    }

    // Mendapatkan barang berdasarkan ID
    public function show($id)
    {
        $barang = Barang::with('kategori')->find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Berhasil mendapatkan barang',
            'data' => $barang
        ]);
    }

    // Mengupdate barang berdasarkan ID
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'nama_barang' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $barang->update($validatedData);

        return response()->json([
            'message' => 'Barang berhasil diperbarui',
            'data' => $barang
        ]);
    }

    // Menghapus barang berdasarkan ID
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $barang->delete();

        return response()->json(['message' => 'Barang berhasil dihapus']);
    }
}
