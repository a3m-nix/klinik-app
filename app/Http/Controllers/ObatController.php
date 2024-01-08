<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::all();
        $judul = 'Data-data Obat';
        return view('obat_index',  compact('obat', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'satuan' => 'required',
            'tipe' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'qty' => 'required',
            'tanggal_expired' => 'required'
        ]);

        $obat = new Obat($validateData);
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->satuan = $request->satuan;
        $obat->tipe = $request->tipe;
        $obat->harga_beli = $request->harga_beli;
        $obat->harga_jual = $request->harga_jual;
        $obat->qty = $request->qty;
        $obat->tanggal_expired = $request->tanggal_expired;
        $obat->save();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
