<?php
namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\BarangKeluar;

// use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    // Generate kode barang berdasarkan kategori
    public function generateKodeBarang($kategoriId)
    {
        $kategori   = Kategori::findOrFail($kategoriId);
        $count      = BarangMasuk::where('id_kategori', $kategoriId)->count() + 1;
        $kodeBarang = strtoupper(substr($kategori->nama, 0, 3)) . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

        return response()->json(['kode_barang' => $kodeBarang]);
    }

    public function generatePDF(Request $request)
    {
        $barangMasuk = BarangMasuk::whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_selesai])->get();
        $pdf         = PDF::loadView('laporan.pdf', compact('barangMasuk'));

        // Generate PDF dan simpan/unduh
        return $pdf->download('laporan_barang_masuk.pdf');
    }

    // Tampilkan halaman laporan dengan filter tanggal
    public function index(Request $request)
    {
        // Validasi tanggal (optional tapi baik untuk keamanan)
        $request->validate([
            'tanggal_mulai'   => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $query = BarangMasuk::with('kategori');

        // Jika filter diisi
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        $barangMasuk = $query->get();

        return view('admin.laporan.index', compact('barangMasuk'));
    }

    // Form create (jika kamu aktifkan lagi nanti)
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.laporan.create', compact('kategori'));
    }

// public function exportPdf(Request $request)
    // {
    //     $data = $this->getFilteredData($request); // supaya bisa dipakai di PDF dan PNG

//     $pdf = Pdf::loadView('admin.laporan.export_pdf', compact('data'));
    //     $filename = 'Laporan-Barang-Masuk-' . now()->format('Ymd_His') . '.pdf';

//     return $pdf->download($filename);
    // }

    public function exportPng(Request $request)
    {
        $data = $this->getFilteredData($request);

        return view('admin.laporan.export_png', compact('data')); // Bisa pakai JS html2canvas di frontend
    }

// Fungsi bantu (untuk filter data)
    private function getFilteredData(Request $request)
    {
        $query = BarangMasuk::with('kategori');

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        return $query->get();
    }
    public function exportPdf(Request $request)
    {
        $query = BarangMasuk::with('kategori');

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        $barangMasuk = $query->get();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('barangMasuk'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

        //    BARANG KELUAR
        public function indexBarangKeluar(Request $request)
        {
            $request->validate([
                'tanggal_mulai'   => 'nullable|date',
                'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            ]);

            $barangKeluar = $this->getFilteredBarangKeluarData($request);

            return view('admin.laporan.barangkeluarpdf', compact('barangKeluar'));
        }

        // Export PDF laporan barang keluar
//    public function exportPdfBarangKeluar(Request $request)
//     {
//         $query = BarangKeluar::with('kategori');

//         if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
//             $query->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_selesai]);
//         }

//         $barangKeluar = $query->get();

//         $pdf = Pdf::loadView('admin.laporan.pdf2', compact('barangKeluar'));
//         return $pdf->download('laporan-barang-keluar.pdf');
//     }
        public function exportPdfBarangKeluar(Request $request)
    {
        $barangKeluar = BarangKeluar::with('kategori')
            ->when($request->tanggal_mulai, function ($query) use ($request) {
                $query->whereDate('tanggal_keluar', '>=', $request->tanggal_mulai);
            })
            ->when($request->tanggal_selesai, function ($query) use ($request) {
                $query->whereDate('tanggal_keluar', '<=', $request->tanggal_selesai);
            })
            ->get();

        $pdf = PDF::loadView('admin.laporan.pdf2', compact('barangKeluar'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-barang-keluar.pdf');
    }



        // Fungsi bantu filter data barang keluar
        private function getFilteredBarangKeluarData(Request $request)
        {
            $query = BarangKeluar::with('kategori');

            if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
                $query->whereBetween('tanggal_keluar', [$request->tanggal_mulai, $request->tanggal_selesai]);
            }

            return $query->get();
        }

}
