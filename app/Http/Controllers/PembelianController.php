<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = pembelian::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        return view('admin.pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembelian.create');
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
            'nama_perusahaan' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ]);

        $pembelian = new pembelian();
        $pembelian->nama_perusahaan = $request->nama_perusahaan;
        $pembelian->nama_barang = $request->nama_barang;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->alamat = $request->alamat;
        $pembelian->keterangan = $request->keterangan;
        $pembelian->save();
        // Alert::success('Success','Data Berhasil di tambahkan')->autoClose(2000);
        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(pembelian $id)
    {
        $pembelian = pembelian::findOrFail($id);
        return view('admin.pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'nama_perusahaan' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ]);

        $pembelian = pembelian::findOrFail($id);
        $pembelian->nama_perusahaan = $request->nama_perusahaan;
        $pembelian->nama_barang = $request->nama_barang;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->alamat = $request->alamat;
        $pembelian->keterangan = $request->keterangan;
        $pembelian->save();
         // Alert::success('Success', 'Edit Data Berhasil di Simpan')->autoclose(2000);
         return redirect()->route('pembelian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembelian $id)
    {
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('pembelian.index');
    }
}
