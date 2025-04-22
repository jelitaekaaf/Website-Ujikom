<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;


class BarangMasukController extends Controller
{
    // Mendapatkan semua data barang masuk
    public function index()
    {
        $barangMasuk = BarangMasuk::with('kategori')->get();
        return response()->json([
            'message' => 'Berhasil mendapatkan daftar barang masuk',
            'data' => $barangMasuk
        ]);
    }

    // Menyimpan data barang masuk baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kode_barang' => 'required|string|unique:barang_masuks,kode_barang',
            'id_kategori' => 'required|exists:kategoris,id',
            'pemasok' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'faktur' => 'nullable|string',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $barangMasuk = BarangMasuk::create($validatedData);

        return response()->json([
            'message' => 'Barang masuk berhasil ditambahkan',
            'data' => $barangMasuk
        ], 201);
    }

    // Mendapatkan barang masuk berdasarkan ID
    public function show($id)
    {
        $barangMasuk = BarangMasuk::with('kategori')->find($id);
        if (!$barangMasuk) {
            return response()->json(['message' => 'Barang masuk tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Berhasil mendapatkan barang masuk',
            'data' => $barangMasuk
        ]);
    }

    // Mengupdate barang masuk berdasarkan ID
    public function update(Request $request, $id)
    {
        $barangMasuk = BarangMasuk::find($id);
        if (!$barangMasuk) {
            return response()->json(['message' => 'Barang masuk tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kode_barang' => 'required|string|unique:barang_masuks,kode_barang,' . $id,
            'id_kategori' => 'required|exists:kategoris,id',
            'pemasok' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'faktur' => 'nullable|string',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $barangMasuk->update($validatedData);

        return response()->json([
            'message' => 'Barang masuk berhasil diperbarui',
            'data' => $barangMasuk
        ]);
    }

    // Menghapus barang masuk berdasarkan ID
    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::find($id);
        if (!$barangMasuk) {
            return response()->json(['message' => 'Barang masuk tidak ditemukan'], 404);
        }

        $barangMasuk->delete();

        return response()->json(['message' => 'Barang masuk berhasil dihapus']);
    }
}
