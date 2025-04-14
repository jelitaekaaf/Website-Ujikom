<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    // Mendapatkan semua data barang keluar
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        return response()->json([
            'message' => 'Berhasil mendapatkan daftar barang keluar',
            'data' => $barangKeluar
        ]);
    }

    // Menyimpan data barang keluar baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|string|unique:barang_keluars,kode',
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'alasan_pengeluaran' => 'required|string',
            'tujuan_pemakaian' => 'required|string|max:255',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $barangKeluar = BarangKeluar::create($validatedData);

        return response()->json([
            'message' => 'Barang keluar berhasil ditambahkan',
            'data' => $barangKeluar
        ], 201);
    }

    // Mendapatkan barang keluar berdasarkan ID
    public function show($id)
    {
        $barangKeluar = BarangKeluar::find($id);
        if (!$barangKeluar) {
            return response()->json(['message' => 'Barang keluar tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Berhasil mendapatkan barang keluar',
            'data' => $barangKeluar
        ]);
    }

    // Mengupdate barang keluar berdasarkan ID
    public function update(Request $request, $id)
    {
        $barangKeluar = BarangKeluar::find($id);
        if (!$barangKeluar) {
            return response()->json(['message' => 'Barang keluar tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'kode' => 'required|string|unique:barang_keluars,kode,' . $id,
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'alasan_pengeluaran' => 'required|string',
            'tujuan_pemakaian' => 'required|string|max:255',
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $barangKeluar->update($validatedData);

        return response()->json([
            'message' => 'Barang keluar berhasil diperbarui',
            'data' => $barangKeluar
        ]);
    }

    // Menghapus barang keluar berdasarkan ID
    public function destroy($id)
    {
        $barangKeluar = BarangKeluar::find($id);
        if (!$barangKeluar) {
            return response()->json(['message' => 'Barang keluar tidak ditemukan'], 404);
        }

        $barangKeluar->delete();

        return response()->json(['message' => 'Barang keluar berhasil dihapus']);
    }
}
