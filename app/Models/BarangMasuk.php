<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    // protected $table = 'barang_masuk';
    protected $fillable =
    ['nama', 'kode_barang', 'id_kategori', 'pemasok', 'jumlah', 'harga_beli', 'tanggal_masuk', 'faktur', 'status'];

    public $timestamp = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}



