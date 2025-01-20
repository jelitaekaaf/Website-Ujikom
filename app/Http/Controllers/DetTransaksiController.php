<?php

namespace App\Http\Controllers;

use App\Models\det_transaksi;
use Illuminate\Http\Request;

class DetTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $det_transaksi = det_transaksi::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        return view('admin.det_transaksi.index', compact('det_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.det_transaksi.create');
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
            'id_transaksi' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
        $det_transaksi = new det_transaksi();
        $det_transaksi->id_transaksi = $request->id_transaksi;
        $det_transaksi->id_barang = $request->id_barang;
        $det_transaksi->jumlah = $request->jumlah;
        $det_transaksi->harga = $request->harga;
        $det_transaksi->save();
        // Alert::success('Success','Data Berhasil di tambahkan')->autoClose(2000);
        return redirect()->route('det_transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\det_transaksi  $det_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(det_transaksi $det_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\det_transaksi  $det_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $det_transaksi = det_transaksi::findOrFail($id);
        return view('admin.det_transaksi.edit', compact('det_transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\det_transaksi  $det_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_transaksi' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',

        ]);
        $det_transaksi = det_transaksi::findOrFail($id);
        $det_transaksi->id_transaksi = $request->id_transaksi;
        $det_transaksi->id_barang = $request->id_barang;
        $det_transaksi->jumlah = $request->jumlah;
        $det_transaksi->harga = $request->harga;
        $det_transaksi->save();
         // Alert::success('Success', 'Edit Data Berhasil di Simpan')->autoclose(2000);
         return redirect()->route('det_transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\det_transaksi  $det_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(det_transaksi $id)
    {
        $det_transaksi = det_transaksi::findOrFail($id);
        $det_transaksi->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('det_transaksi.index');
    }
}
