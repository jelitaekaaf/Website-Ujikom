<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CatatanStokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\CatatanKeuanganController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Barang2Controller;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ROUTE BACKEND
Route::resource('/kategori', KategoriController::class);
Route::resource('/pembelian', PembelianController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/catatanstok', CatatanStokController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::resource('/dettransaksi', DetailTransaksiController::class);
Route::resource('/catatankeuangan', CatatanKeuanganController::class);
Route::resource('/barang_masuk', BarangMasukController::class);
Route::resource('/barang_keluar', BarangKeluarController::class);
Route::resource('/barangg', BarangMasukController::class);
// Route::get('/laporan/barang-masuk', [LaporanController::class, 'exportBarangMasukPdf'])->name('laporan.barangmasuk');
// Route::get('/laporan/barang-keluar', [LaporanController::class, 'exportBarangKeluarPdf'])->name('laporan.barangkeluar');

Route::get('/laporan/barang-masuk', [LaporanController::class, 'barangMasuk'])->name('laporan.barangMasuk');
Route::get('/laporan/barang-keluar', [LaporanController::class, 'barangKeluar'])->name('laporan.barangKeluar');
Route::get('/get-barang-by-kategori/{id}', [App\Http\Controllers\BarangController::class, 'getBarangByKategori']);


// ROUTE LAIN
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bKeluar', [App\Http\Controllers\HomeController::class, 'bKeluar'])->name('bKeluar');
Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'kalendar'])->name('calendar');
// Route::get('/laporan', [App\Http\Controllers\HomController::class, 'lapor'])->name('laporan');
Route::get('/barang_masuk/exportExcel', [BarangMasukController::class, 'exportExcel'])->name('barang_masuk.exportExcel');



// SET STATUS BARANG MASUK
Route::put('/barang_masuk/{id}/approve', [BarangMasukController::class, 'approve'])->name('barang_masuk.approve');
Route::put('/barang_masuk/{id}/reject', [BarangMasukController::class, 'reject'])->name('barang_masuk.reject');
Route::put('/barang_masuk/{id}/pending', [BarangMasukController::class, 'setPending'])->name('barang_masuk.pending');
Route::put('/barang_masuk/{id}/status', [BarangMasukController::class, 'updateStatus'])->name('barang_masuk.status');
Route::put('/barang_masuk/{id}/status', [BarangMasukController::class, 'updateStatus'])->name('barang_masuk.updateStatus');

// SET STATUS BARANG KELUAR
Route::put('/barang_keluar/{id}/approve', [BarangKeluarController::class, 'approve'])->name('barang_keluar.approve');
Route::put('/barang_keluar/{id}/reject', [BarangKeluarController::class, 'reject'])->name('barang_keluar.reject');
Route::put('/barang_keluar/{id}/pending', [BarangKeluarController::class, 'setPending'])->name('barang_keluar.pending');
Route::put('/barang_keluar/{id}/status', [BarangKeluarController::class, 'updateStatus'])->name('barang_keluar.status');
Route::put('/barang_keluar/{id}/status', [BarangKeluarController::class, 'updateStatus'])->name('barang_masuk.updateStatus');
Route::post('/barang_keluar/update-status/{id}', [BarangKeluarController::class, 'updateStatus'])->name('barang_keluar.update_status');


// KODE OTOMATIS
Route::get('/generate-kode/{id_kategori}', [BarangMasukController::class, 'generateKodeBarang']);

// ROUTE ACTIVITY LOG
Route::get('/activity_log', [ActivityLogController::class, 'index']);
