<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahBarangMasuk = BarangMasuk::count();
        $jumlahBarangKeluar = BarangKeluar::count();
        $jumlahKategori = Kategori::count();
        // $jumlahLaporan = Laporan::count(); // Ganti jika nama modelnya berbeda

        return view('home', compact(
            'jumlahBarangMasuk',
            'jumlahBarangKeluar',
            'jumlahKategori',
            // 'jumlahLaporan'
        ));
        // Statistik Barang Masuk/Keluar Bulanan
        $barangMasuk = BarangMasuk::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->groupBy('bulan')->pluck('total', 'bulan');

        $barangKeluar = BarangKeluar::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->groupBy('bulan')->pluck('total', 'bulan');
        

        // Barang Stok Minimum (misal: < 10)
        $stokMinimum = Barang::where('stok', '<', 10)->get();

        // Kategori Barang Terlaris (Berdasarkan Barang Keluar)
        $kategoriTerlaris = BarangKeluar::select('kategori_id')
            ->with('kategori')
            ->groupBy('kategori_id')
            ->selectRaw('kategori_id, COUNT(*) as total')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view('dashboard.index', compact('barangMasuk', 'barangKeluar', 'stokMinimum', 'kategoriTerlaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
