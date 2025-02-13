<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $fillable = [ 'kode', 'nama', 'jumlah', 'alasan_pengeluaran', 'tujuan_pemakaian', 'status','id_kategori'];
    public $timestamp = true;
}
