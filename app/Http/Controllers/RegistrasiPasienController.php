<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_jk'] = [
            'Pria' => 'Pria',
            'Wanita' => 'Wanita'
        ];
        $data['dokter'] = \App\Models\Dokter::all();
        $data['poli'] = \App\Models\Poli::all();
        return view('registrasipasien_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi inputan
        $validasiData = $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'tanggal' => 'required',
            'poli_id' => 'required|exists:polis,id',
        ]);
        \DB::beginTransaction();
        //cek kode pasien terakhir
        $kodeQuery = \App\Models\Pasien::orderBy('id', 'desc')->first();
        $kode = 'P0001';
        if ($kodeQuery) {
            $kode = 'P' . sprintf('%04d', $kodeQuery->id + 1);
        }
        //simpan pasien
        $pasien = new \App\Models\Pasien();
        $pasien->kode_pasien = $kode;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->nomor_hp = $request->nomor_hp;
        $pasien->save();
        //cek kode adm terakhir
        $kodeAdm = \App\Models\Administrasi::orderBy('id', 'desc')->first();
        $kode = 'ADM0001';
        if ($kodeAdm) {
            $kode = 'ADM' . sprintf('%04d', $kodeAdm->id + 1);
        }

        $poli = \App\Models\Poli::findOrfail($request->poli_id);
        $adm = new \App\Models\Administrasi();
        $adm->kode_administrasi = $kode;
        $adm->poli = $poli->nama;
        $adm->pasien_id = $pasien->id;
        $adm->tanggal = $request->tanggal;
        $adm->keluhan = strip_tags($request->keluhan);
        $adm->dokter_id = $poli->dokter_id;
        $adm->biaya = $poli->biaya;
        $adm->save();
        \DB::commit();
        flash('Registrasi Berhasil, Silahkan datang pada tanggal ' . $request->tanggal . ' untuk melakukan pemeriksaan');
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
