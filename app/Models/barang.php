<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori', 'nama_barang', 'harga_beli', 'harga_jual','stok', ];
    public $timestamp = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function catatanStok()
    {
        return $this->hasMany(CatatanStok::class, 'id_barang');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_barang');
    }


    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

}
