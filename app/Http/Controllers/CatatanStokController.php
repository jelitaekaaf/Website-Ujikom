<?php

namespace App\Http\Controllers;

use App\Models\catatan_stok;
use Illuminate\Http\Request;

class CatatanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatan_stok =catatan_stok::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        return view('admin.catatan_stok.index', compact('catatan_stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catatan_stok.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',

        ]);
        $catatan_stok = new catatan_stok();
        $catatan_stok->id_barang = $request->id_barang;
        $catatan_stok->jenis = $request->jenis;
        $catatan_stok->jumlah = $request->jumlah;
        $catatan_stok->tanggal = $request->tanggal;
        $catatan_stok->save();
        // Alert::success('Success','Data Berhasil di tambahkan')->autoClose(2000);
        return redirect()->route('catatan_stok.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catatan_stok  $catatan_stok
     * @return \Illuminate\Http\Response
     */
    public function show(catatan_stok $catatan_stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catatan_stok  $catatan_stok
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $catatan_stok = catatan_stok::findOrFail($id);
        return view('admin.catatan_stok.edit', compact('catatan_stok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catatan_stok  $catatan_stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',

        ]);
        $catatan_stok = catatan_stok::findOrFail($id);
        $catatan_stok->id_barang = $request->id_barang;
        $catatan_stok->jenis = $request->jenis;
        $catatan_stok->jumlah = $request->jumlah;
        $catatan_stok->tanggal = $request->tanggal;
        $catatan_stok->save();
         // Alert::success('Success', 'Edit Data Berhasil di Simpan')->autoclose(2000);
         return redirect()->route('catatan_stok.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catatan_stok  $catatan_stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(catatan_stok $id)
    {
        $catatan_stok = catatan_stok::findOrFail($id);
        $catatan_stok->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('catatan_stok.index');
    }
}
