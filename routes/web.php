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

// ROUTE LAIN
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'kalendar'])->name('calendar');
Route::get('/laporan', [App\Http\Controllers\HomeController::class, 'lapor'])->name('laporan');
Route::get('/barang_masuk/exportExcel', [BarangMasukController::class, 'exportExcel'])->name('barang_masuk.exportExcel');



// SET STATUS
Route::put('/barang_masuk/{id}/approve', [BarangMasukController::class, 'approve'])->name('barang_masuk.approve');
Route::put('/barang_masuk/{id}/reject', [BarangMasukController::class, 'reject'])->name('barang_masuk.reject');
Route::put('/barang_masuk/{id}/pending', [BarangMasukController::class, 'setPending'])->name('barang_masuk.pending');
Route::put('/barang_masuk/{id}/status', [BarangMasukController::class, 'updateStatus'])->name('barang_masuk.status');
Route::put('/barang_masuk/{id}/status', [BarangMasukController::class, 'updateStatus'])->name('barang_masuk.updateStatus');


// KODE OTOMATIS
Route::get('/generate-kode/{id_kategori}', [BarangMasukController::class, 'generateKodeBarang']);
