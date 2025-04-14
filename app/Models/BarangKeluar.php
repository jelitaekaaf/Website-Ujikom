<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $fillable = [ 'kode', 'nama', 'tanggal_keluar','jumlah', 'alasan_pengeluaran', 'tujuan_pemakaian', 'status','id_kategori'];
    public $timestamp = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
