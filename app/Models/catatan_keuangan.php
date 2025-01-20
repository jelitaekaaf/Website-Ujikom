<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan_keuangan extends Model
{
    use HasFactory;
    protected $fillable = ['id','jenis','jumlah','tanggal','keterangan'];

    public $timestamps = true;

}
