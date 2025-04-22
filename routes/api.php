<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\StokController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\BarangMasukController;
use App\Http\Controllers\Api\BarangKeluarController;
use App\Http\Controllers\Api\KeuanganController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
// Route::get('/profile', [AuthController::class, 'profile']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/kategori', [KategoriController::class, 'kategori']);
Route::get('/kategori', [KategoriController::class, 'kategori']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/profile', function (Request $request) {
    return $request->user();

})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});

//KATGORI
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);

});


//STOK
Route::prefix('stok')->group(function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::put('/{id}', [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

//BARANGS
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

//BARANG MASUK
Route::prefix('barangMasuk')->group(function () {
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::post('/', [BarangMasukController::class, 'store']);
    Route::get('/{id}', [BarangMasukController::class, 'show']);
    Route::put('/{id}', [BarangMasukController::class, 'update']);
    Route::delete('/{id}', [BarangMasukController::class, 'destroy']);
});

//BARANG KELUAR
Route::prefix('barangKeluar')->group(function () {
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::post('/', [BarangKeluarController::class, 'store']);
    Route::get('/{id}', [BarangKeluarController::class, 'show']);
    Route::put('/{id}', [BarangKeluarController::class, 'update']);
    Route::delete('/{id}', [BarangKeluarController::class, 'destroy']);
});

//KEUANGAN
Route::prefix('keuangan')->group(function () {
    Route::get('/', [KeuanganController::class, 'index']);
    Route::post('/', [KeuanganController::class, 'store']);
    Route::get('/{id}', [KeuanganController::class, 'show']);
    Route::put('/{id}', [KeuanganController::class, 'update']);
    Route::delete('/{id}', [KeuanganController::class, 'destroy']);
});
