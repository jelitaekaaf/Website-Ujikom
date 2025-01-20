<?php

namespace App\Http\Controllers;

use App\Models\catatan_keuangan;
use Illuminate\Http\Request;

class CatatanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatan_keuangan =catatan_keuangan::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        return view('admin.catatan_keuangan.index', compact('catatan_keuangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catatan_keuangan.create');
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
            'jenis' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',

        ]);
        $catatan_keuangan = new catatan_keuangan();
        $catatan_keuangan->jenis = $request->jenis;
        $catatan_keuangan->jumlah = $request->jumlah;
        $catatan_keuangan->tanggal = $request->tanggal;
        $catatan_keuangan->keterangan = $request->keterangan;
        $catatan_keuangan->save();
        // Alert::success('Success','Data Berhasil di tambahkan')->autoClose(2000);
        return redirect()->route('catatan_keuangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catatan_keuangan  $catatan_keuangan
     * @return \Illuminate\Http\Response
     */
    public function show(catatan_keuangan $catatan_keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catatan_keuangan  $catatan_keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(catatan_keuangan $id)
    {
        $catatan_keuangan = catatan_keuangan::findOrFail($id);
        return view('admin.catatan_keuangan.edit', compact('catatan_keuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catatan_keuangan  $catatan_keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'jenis' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',

        ]);
        $catatan_keuangan = catatan_keuangan::findOrFail($id);
        $catatan_keuangan->jenis = $request->jenis;
        $catatan_keuangan->jumlah = $request->jumlah;
        $catatan_keuangan->tanggal = $request->tanggal;
        $catatan_keuangan->keterangan = $request->keterangan;
        $catatan_keuangan->save();
         // Alert::success('Success', 'Edit Data Berhasil di Simpan')->autoclose(2000);
         return redirect()->route('catatan_keuangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catatan_keuangan  $catatan_keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(catatan_keuangan $id)
    {
        $catatan_keuangan = catatan_keuangan::findOrFail($id);
        $catatan_keuangan->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('catatan_keuangan.index');
    }
}
