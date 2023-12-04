<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cari = request('q');
        if ($cari) {
            $data['pasien'] = \App\Models\Pasien::where('nama_pasien', 'like', '%' . $cari . '%')
                ->orWhere('kode_pasien', 'like', '%' . $cari . '%')
                ->paginate(10);
        } else {
            $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        }
        $data['judul'] = 'Data-data Pasien';
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['judul'] = 'Tambah Data';
        return view('pasien_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
        ]);
        $kodeQuery = \App\Models\Pasien::orderBy('id', 'desc')->first();
        $kode = 'P0001';
        if ($kodeQuery) {
            $kode = 'P' . sprintf('%04d', $kodeQuery->id + 1);
        }
        $pasien = new \App\Models\Pasien();
        $pasien->kode_pasien = $kode;
        $pasien->fill($validasiData);
        $pasien->save();

        flash('Data berhasil disimpan');
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
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        $data['judul'] = 'Tambah Data';
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'nomor_hp' => 'required',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($validasiData);
        $pasien->save();

        flash('Data berhasil diubah');
        return redirect('pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        if ($pasien->administrasi->count() >= 1) {
            flash('Data tidak bisa dihapus karena sudah digunakan')->error();
            return back();
        }
        $pasien->delete();
        flash('Data berhasil dihapus');
        return back();
    }

    public function laporan()
    {
    }
}
