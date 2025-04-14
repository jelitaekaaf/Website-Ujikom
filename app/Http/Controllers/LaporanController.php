<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class LaporanController extends Controller
{
    // public function barangMasuk()
    // {
    //     $barangMasuk = BarangMasuk::orderBy('tanggal_masuk', 'desc')->get();
    //     return view('admin.laporan.barangmasukpdf', compact('barangMasuk'));
    // }

    // public function barangKeluar()
    // {
    //     $barangKeluar = BarangKeluar::orderBy('tanggal_keluar', 'desc')->get();
    //     return view('admin.laporan.barangkeluarpdf', compact('barangKeluar'));
    // }

    public function barangMasuk(Request $request)
    {
        $query = BarangMasuk::with('kategori');

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_masuk', $request->tanggal);
        }

        $barangMasuk = $query->get();

        return view('admin.laporan.barangmasukpdf', compact('barangMasuk'));
    }

    public function barangKeluar(Request $request)
    {
        $query = BarangKeluar::with('kategori');

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_keluar', $request->tanggal);
        }

        $barangKeluar = $query->get();

        return view('admin.laporan.barangkeluarpdf', compact('barangKeluar'));
    }

}
