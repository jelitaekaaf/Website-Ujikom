<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class det_transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi','id_barang','jumlah','harga'];

    public function barang()
    {
        return $this->BelongsTo(Barang::class, 'id_barang');
    }
    public function transaksi()
    {
        return $this->BelongsTo(Transaksi::class, 'id_transaksi');
    }
}
