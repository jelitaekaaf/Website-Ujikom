<?php

namespace App\Http\Controllers;
use App\Models\BarangKeluar;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangKeluarController extends Controller
{
    // Generate Kode Barang Keluar
    public function generateKodeBarang($kategoriId)
    {
        $kategori = Kategori::findOrFail($kategoriId);
        $count = BarangKeluar::where('id_kategori', $kategoriId)->count() + 1;
        $kodeBarang = strtoupper(substr($kategori->nama, 0, 3)) . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

        return response()->json(['kode_barang' => $kodeBarang]);
    }

    // Menampilkan Daftar Barang Keluar
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        return view('admin.barang_keluar.index', compact('barangKeluar'));
    }

    // Halaman untuk Menambahkan Barang Keluar
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.barang_keluar.create', compact('kategori'));
    }

    // Menyimpan Data Barang Keluar
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_barang' => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
            'jumlah' => 'required|integer',
            'alasan_pengeluaran' => 'required|string',
            'tujuan_pemakaian' => 'required|string',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        // Ambil kategori
        $kategori = Kategori::findOrFail($request->id_kategori);
        $kodeKategori = strtoupper(substr($kategori->nama, 0, 3)); // Ambil 3 huruf pertama

        // Hitung jumlah barang keluar dengan kategori yang sama
        $jumlahBarangKeluar = BarangKeluar::where('id_kategori', $request->id_kategori)->count() + 1;

        // Format kode barang keluar
        $kodeBarang = $kodeKategori . str_pad($jumlahBarangKeluar, 4, '0', STR_PAD_LEFT);

        // Membuat objek BarangKeluar
        $barangKeluar = new BarangKeluar();
        $barangKeluar->nama = $request->nama;
        $barangKeluar->kode_barang = $kodeBarang; // Kode otomatis
        $barangKeluar->id_kategori = $request->id_kategori;
        $barangKeluar->jumlah = $request->jumlah;
        $barangKeluar->alasan_pengeluaran = $request->alasan_pengeluaran;
        $barangKeluar->tujuan_pemakaian = $request->tujuan_pemakaian;
        $barangKeluar->status = $request->status;

        $barangKeluar->save();

        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil ditambahkan!');
    }

    // Menampilkan Halaman Edit Barang Keluar
    public function edit($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $kategori = Kategori::all(); // Pastikan model Kategori ada
        return view('admin.barang_keluar.edit', compact('barangKeluar', 'kategori'));
    }

    // Memperbarui Data Barang Keluar
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'kode_barang' => 'required',
            'nama' => 'required|string',
            'jumlah' => 'required|numeric',
            'alasan_pengeluaran' => 'required|string',
            'tujuan_pemakaian' => 'required|string',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->update($request->except(['_token', '_method']));

        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar berhasil diperbarui!');
    }

    // Menghapus Data Barang Keluar
    public function destroy($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->delete();

        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil dihapus.');
    }

    // Menyetujui Barang Keluar
    public function approve($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->status = 'disetujui';
        $barangKeluar->save();

        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil disetujui.');
    }

    // Menolak Barang Keluar
    public function reject($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->status = 'ditolak';
        $barangKeluar->save();

        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar telah ditolak.');
    }

    // Menyetel Status Barang Keluar ke Pending
    public function setPending($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->status = 'pending';
        $barangKeluar->save();

        return redirect()->back()->with('success', 'Status barang keluar berhasil dikembalikan ke Pending.');
    }
}
