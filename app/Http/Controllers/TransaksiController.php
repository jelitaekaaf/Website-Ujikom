<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaksi.create');
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
            'id_user' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'total' => 'required',

        ]);
        $transaksi = new transaksi();
        $transaksi->id_user = $request->id_user;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();
        // Alert::success('Success','Data Berhasil di tambahkan')->autoClose(2000);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $transaksi = transaksi::findOrFail($id);
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'total' => 'required',
        ]);

        $transaksi = transaksi::findOrFail($id);
        $transaksi->id_user = $request->id_user;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->total = $request->total;
        $transaksi->save();
         // Alert::success('Success', 'Edit Data Berhasil di Simpan')->autoclose(2000);
         return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('transaksi.index');
    }
}
