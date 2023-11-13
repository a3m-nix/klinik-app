<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['administrasi'] = \App\Models\Administrasi::paginate(5);
        $data['judul'] = 'Data Administrasi';
        return view('administrasi_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['list_pasien'] = \App\Models\Pasien::selectRaw("id, concat(kode_pasien, ' - ', nama_pasien) as tampil")->pluck('tampil', 'id');
        $data['list_dokter'] = \App\Models\Dokter::selectRaw("id, concat(kode_dokter, ' - ', nama_dokter) as tampil")->pluck('tampil', 'id');
        return view('administrasi_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kode_administrasi' => 'required|unique:administrasis,kode_administrasi',
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required',
            'biaya' => 'required',
        ]);
        \App\Models\Administrasi::create($validasiData);
        flash('Data sudah disimpan')->success();
        return back();
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
        $data['administrasi'] = \App\Models\Administrasi::findOrfail($id);
        $data['list_pasien'] = \App\Models\Pasien::selectRaw("id, concat(kode_pasien, ' - ', nama_pasien) as tampil")->pluck('tampil', 'id');
        $data['list_dokter'] = \App\Models\Dokter::selectRaw("id, concat(kode_dokter, ' - ', nama_dokter) as tampil")->pluck('tampil', 'id');
        return view('administrasi_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'kode_administrasi' => 'required|unique:administrasis,kode_administrasi,' . $id,
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required',
            'biaya' => 'required',
        ]);
        $administrasi = \App\Models\Administrasi::findOrfail($id);
        $administrasi->update($validasiData);
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
