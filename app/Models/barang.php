<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama','harga_beli','harga_jual','stok','id_kategori','id_pembelian'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->BelongsTo(kategori::class, 'id_kategori');
    }
    public function pembelian()
    {
        return $this->BelongsTo(pembelian::class, 'id_pembelian');
    }

}
