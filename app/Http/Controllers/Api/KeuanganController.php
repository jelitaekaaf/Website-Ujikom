<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatatanKeuangan;

class KeuanganController extends Controller
{
    // Mendapatkan semua catatan keuangan
    public function index()
    {
        $keuangan = CatatanKeuangan::all();
        return response()->json([
            'message' => 'Berhasil mendapatkan catatan keuangan',
            'data' => $keuangan
        ]);
    }

    // Menyimpan catatan keuangan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required|integer',
            'jenis' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        $keuangan = CatatanKeuangan::create($validatedData);

        return response()->json([
            'message' => 'Catatan keuangan berhasil ditambahkan',
            'data' => $keuangan
        ], 201);
    }

    // Mendapatkan catatan keuangan berdasarkan ID
    public function show($id)
    {
        $keuangan = CatatanKeuangan::find($id);
        if (!$keuangan) {
            return response()->json(['message' => 'Catatan keuangan tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Berhasil mendapatkan catatan keuangan',
            'data' => $keuangan
        ]);
    }

    // Mengupdate catatan keuangan berdasarkan ID
    public function update(Request $request, $id)
    {
        $keuangan = CatatanKeuangan::find($id);
        if (!$keuangan) {
            return response()->json(['message' => 'Catatan keuangan tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'jenis' => 'required|integer',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        $keuangan->update($validatedData);

        return response()->json([
            'message' => 'Catatan keuangan berhasil diperbarui',
            'data' => $keuangan
        ]);
    }

    // Menghapus catatan keuangan berdasarkan ID
    public function destroy($id)
    {
        $keuangan = CatatanKeuangan::find($id);
        if (!$keuangan) {
            return response()->json(['message' => 'Catatan keuangan tidak ditemukan'], 404);
        }

        $keuangan->delete();

        return response()->json(['message' => 'Catatan keuangan berhasil dihapus']);
    }
}
