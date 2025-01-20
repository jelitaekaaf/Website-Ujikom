<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','tanggal','jenis','total'];

    public $timestamps = true;

    public function user()
    {
        return $this->BelongsTo(User::class, 'id_user');
    }
}

