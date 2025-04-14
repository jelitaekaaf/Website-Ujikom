<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriExport extends Controller
{
    public function collection()
    {
        return Kategori::select('id', 'nama')->get();
    }

    public function headings(): array
    {
        return ["ID", "Nama Kategori"];
    }
}
