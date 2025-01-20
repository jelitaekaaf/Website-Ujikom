<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_perusahaan','nama_barang','jumlah','tanggal','alamat','keterangan'];

    public $timestamps = true;

}
