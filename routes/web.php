<?php

use App\Http\Controllers\ActivityLogController;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CatatanKeuanganController;
use App\Http\Controllers\CatatanStokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-barang-by-kategori/{id}', [BarangController::class, 'getBarangByKategori']);

// LAPORAN BARANG MASUK
Route::get('/laporan-barang-masuk', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan-barang-keluar', [LaporanController::class, 'indexBarangKeluar'])->name('laporan.barangkeluarpdf');
Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');
Route::get('/laporan/export/png', [LaporanController::class, 'exportPng'])->name('laporan.export.png');
Route::get('/generate-kode/{id_kategori}', [LaporanController::class, 'generateKodeBarang'])->name('generate.kode.barang');

// LAPORAN BARANG KELUAR
Route::get('/laporan/barang-keluar', [LaporanController::class, 'indexBarangKeluar'])->name('laporan.barangKeluar');
Route::get('/laporan/barang-keluar/pdf', [LaporanController::class, 'exportPdfBarangKeluar'])->name('laporan.barangKeluar.pdf');


// EXPORT BARANG MASUK
Route::get('/barang_masuk/exportExcel', [BarangMasukController::class, 'exportExcel'])->name('barang_masuk.exportExcel');
Route::get('/barang-masuk/export-pdf', [BarangMasukController::class, 'exportPdf'])->name('barang_masuk.export_pdf');

// DASHBOARD DAN HALAMAN LAIN
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bKeluar', [App\Http\Controllers\HomeController::class, 'bKeluar'])->name('bKeluar');
Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'kalendar'])->name('calendar');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

// SET STATUS BARANG MASUK
Route::put('/barang_masuk/{id}/approve', [BarangMasukController::class, 'approve'])->name('barang_masuk.approve');
Route::put('/barang_masuk/{id}/reject', [BarangMasukController::class, 'reject'])->name('barang_masuk.reject');
Route::put('/barang_masuk/{id}/pending', [BarangMasukController::class, 'setPending'])->name('barang_masuk.pending');
Route::put('/barang_masuk/{id}/status', [BarangMasukController::class, 'updateStatus'])->name('barang_masuk.status');

// SET STATUS BARANG KELUAR
Route::put('/barang_keluar/{id}/approve', [BarangKeluarController::class, 'approve'])->name('barang_keluar.approve');
Route::put('/barang_keluar/{id}/reject', [BarangKeluarController::class, 'reject'])->name('barang_keluar.reject');
Route::put('/barang_keluar/{id}/pending', [BarangKeluarController::class, 'setPending'])->name('barang_keluar.pending');
Route::put('/barang_keluar/{id}/status', [BarangKeluarController::class, 'updateStatus'])->name('barang_keluar.status');
Route::post('/barang_keluar/update-status/{id}', [BarangKeluarController::class, 'updateStatus'])->name('barang_keluar.update_status');

// ROUTE ACTIVITY LOG
Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
Route::delete('/activity-logs/{id}', [ActivityLogController::class, 'destroy'])->name('activity-logs.destroy');
Route::delete('/activity-logs', [ActivityLogController::class, 'clearAll'])->name('activity-logs.clearAll');

