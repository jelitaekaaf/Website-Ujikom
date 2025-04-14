<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang2 extends Model
{
    use HasFactory;
    protected $fillable = ['kode_barang', 'nama', 'kategori', 'stok'];
    public $timestamp = true;
}
