<?php

namespace App\Http\Controllers;

use App\Models\aktivitas;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aktivitas =Aktivitas::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        return view('admin.aktivitas.index', compact('aktivitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aktivitas.create');
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
            'aktivitas' => 'required',
            'keterangan' => 'required',

        ]);
        $aktivitas = new aktivitas();
        $aktivitas->id_user = $request->id_user;
        $aktivitas->tanggal = $request->tanggal;
        $aktivitas->aktivitas = $request->aktivitas;
        $aktivitas->keterangan = $request->keterangan;
        $aktivitas->save();
        // Alert::success('Success','Data Berhasil di tambahkan')->autoClose(2000);
        return redirect()->route('aktivitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aktivitas  $aktivitas
     * @return \Illuminate\Http\Response
     */
    public function show(aktivitas $aktivitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aktivitas  $aktivitas
     * @return \Illuminate\Http\Response
     */
    public function edit(aktivitas $id)
    {
        $aktivitas = aktivitas::findOrFail($id);
        return view('admin.aktivitas.edit', compact('aktivitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aktivitas  $aktivitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'tanggal' => 'required',
            'aktivitas' => 'required',
            'keterangan' => 'required',

        ]);
        $aktivitas = aktivitas::findOrFail($id);
        $aktivitas->id_user = $request->id_user;
        $aktivitas->tanggal = $request->tanggal;
        $aktivitas->aktivitas = $request->aktivitas;
        $aktivitas->keterangan = $request->keterangan;

        $aktivitas->save();

        // Alert::success('Success', 'Edit Data Berhasil di Simpan')->autoclose(2000);
        return redirect()->route('aktivitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aktivitas  $aktivitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(aktivitas $id)
    {
        $aktivitas = aktivitas::findOrFail($id);
        $aktivitas->delete();
        // Alert::success('Success', 'Data Ini Telah Di Hapus')->autoclose(2000);
        return redirect()->route('aktivitas.index');
    }
}
