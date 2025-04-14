<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
use App\Models\Barang2;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Storage;

class BarangMasukController extends Controller
{

    public function generateKodeBarang($kategoriId)
{
    $kategori = Kategori::findOrFail($kategoriId);
    $count = BarangMasuk::where('id_kategori', $kategoriId)->count() + 1;
    $kodeBarang = strtoupper(substr($kategori->nama, 0, 3)) . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

    return response()->json(['kode_barang' => $kodeBarang]);
}

    public function index()
    {
        $barangMasuk = BarangMasuk::all();
        return view('admin.barang_masuk.index', compact('barangMasuk'));

    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.barang_masuk.create', compact('kategori'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'id_kategori' => 'required|exists:kategoris,id',
        'pemasok' => 'required',
        'jumlah' => 'required|integer',
        'harga_beli' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
        'faktur' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        'status' => 'required'
    ]);

    // Ambil kategori
    $kategori = Kategori::findOrFail($request->id_kategori);
    $kodeKategori = strtoupper(substr($kategori->nama, 0, 3)); // Ambil 3 huruf pertama

    // Hitung jumlah barang dengan kategori yang sama
    $jumlahBarang = BarangMasuk::where('id_kategori', $request->id_kategori)->count() + 1;

    // Format kode barang
    $kodeBarang = $kodeKategori . str_pad($jumlahBarang, 4, '0', STR_PAD_LEFT);

    $barangMasuk = new BarangMasuk();
    $barangMasuk->nama = $request->nama;
    $barangMasuk->kode_barang = $kodeBarang; // Kode otomatis
    $barangMasuk->id_kategori = $request->id_kategori;
    $barangMasuk->pemasok = $request->pemasok;
    $barangMasuk->jumlah = $request->jumlah;
    $barangMasuk->harga_beli = $request->harga_beli;
    $barangMasuk->tanggal_masuk = $request->tanggal_masuk;
    $barangMasuk->status = $request->status;

    if ($request->hasFile('faktur')) {
        $path = $request->file('faktur')->store('faktur', 'public');
        $barangMasuk->faktur = 'storage/' . $path;
    }


    $barangMasuk->save();

    // return redirect()->route('barang_masuk.index');
    return redirect()->route('barang_masuk.index')->with('success', 'Data berhasil ditambahkan!');

}



    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $kategori = Kategori::all(); // Pastikan model Kategori ada
        return view('admin.barang_masuk.edit', compact('barangMasuk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'kode_barang' => 'required',
            'nama' => 'required|string',
            'pemasok' => 'required|string',
            'jumlah' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:pending,disetujui,ditolak',
            'faktur' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->update($request->except(['_token', '_method']));

        // Upload File
        // if ($request->hasFile('faktur')) {
        //     $file = $request->file('faktur');
        //     $path = $file->store('faktur_barang', 'public'); // Simpan di storage
        //     $data['faktur'] = 'storage/' . $path;

        //     // Hapus faktur lama jika ada
        //     if ($barangMasuk->faktur) {
        //         Storage::disk('public')->delete(str_replace('storage/', '', $barangMasuk->faktur));
        //     }
        // }

        // logActivity('update', 'barang_masuk', 'Mengedit barang masuk dengan ID '.$id);
        // return response()->json(['message' => 'Data berhasil diperbarui']);
        return redirect()->route('barang_masuk.index')->with('success', 'Data berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        if ($barangMasuk->faktur) {
            Storage::delete(str_replace('storage/', '', $barangMasuk->faktur));
        }
        $barangMasuk->delete();

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil dihapus.');
    }

    public function approve($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        $barang->status = 'disetujui';
        $barang->save();

        return redirect()->route('barang_masuk.index')->with('success', 'Barang berhasil disetujui.');
    }

    public function reject($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        $barang->status = 'ditolak';
        $barang->save();

        return redirect()->route('barang_masuk.index')->with('success', 'Barang telah ditolak.');
    }

    public function setPending($id)
    {
        $barang = BarangMasuk::findOrFail($id);
        $barang->status = 'pending';
        $barang->save();

    return redirect()->back()->with('success', 'Status berhasil dikembalikan ke Pending.');
    }

    public function updateStatus(Request $request, $id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->status = $request->status;
        $barangMasuk->save();

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }


}
