<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Mendapatkan semua kategori
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'message' => 'Berhasil mendapatkan kategori',
            'data' => $kategori
        ]);
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create($validatedData);

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $kategori
        ], 201);
    }

    // Mendapatkan kategori berdasarkan ID
    public function show($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Berhasil mendapatkan kategori',
            'data' => $kategori
        ]);
    }

    // Mengupdate kategori berdasarkan ID
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update($validatedData);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui',
            'data' => $kategori
        ]);
    }

    // Menghapus kategori berdasarkan ID
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
