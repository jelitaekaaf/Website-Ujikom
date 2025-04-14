<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
// use App\Models\Kategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        $jumlahBarangMasuk = BarangMasuk::count();
        $jumlahBarangKeluar = BarangKeluar::count();
        $jumlahKategori = Kategori::count();
        $stokTipis = Barang::where('stok', '<=', 5)->get();
        // $jumlahKategori = Kategori::count();
        // Tambahkan juga data lain jika perlu
        return view('home', compact('jumlahKategori','jumlahBarangMasuk','jumlahBarangKeluar','stokTipis'));
    }
    public function bKeluar()
    {
        return view('bKeluar');
    }
    public function kalendar()
    {
        return view('calendar');
    }
    public function lapor()
    {
        return view('laporan');
    }


}
