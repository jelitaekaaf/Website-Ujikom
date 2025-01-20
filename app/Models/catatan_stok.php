<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan_stok extends Model
{
    use HasFactory;
    protected $fillable = ['id_barang','jenis','jumlah','tanggal'];

    public function barang()
    {
        return $this->BelongsTo(Barang::class, 'id_barang');
    }

}
