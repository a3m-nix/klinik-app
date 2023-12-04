<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dokter'] = \App\Models\Dokter::get();
        $data['judul'] = 'Data-data Dokter';
        return view('dokter_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:8048'
        ]);
        $kodeQuery = \App\Models\Dokter::orderBy('id', 'desc')->first();
        $kode = 'D0001';
        if ($kodeQuery) {
            $kode = 'D' . sprintf('%04d', $kodeQuery->id + 1);
        }
        $dokter = new \App\Models\Dokter();

        if ($request->hasFile('foto')) {
            //buang foto dari validasi data
            unset($validasiData['foto']);
            $path = $request->file('foto')->store('public/foto_dokter');
            $dokter->foto = $path;
        }
        $dokter->kode_dokter = $kode;
        $dokter->fill($validasiData);
        $dokter->save();

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
        $data['dokter'] = \App\Models\Dokter::findOrFail($id);
        $data['list_sp'] = [
            'Umum' => 'Umum',
            'Gigi' => 'Gigi',
            'Kandungan' => 'Kandungan',
            'Anak' => 'Anak',
            'Bedah' => 'Bedah',
        ];
        return view('dokter_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:8048'
        ]);

        $dokter = \App\Models\Dokter::findOrFail($id);
        if ($request->hasFile('foto')) {
            unset($validasiData['foto']);
            $path = $request->file('foto')->store('public/foto_dokter');
            $dokter->foto = $path;
        }
        $dokter->fill($validasiData);
        $dokter->save();

        flash('Data berhasil diubah');
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = \App\Models\Dokter::findOrFail($id);
        if ($dokter->administrasi->count() >= 1) {
            flash('Data tidak bisa dihapus karena sudah digunakan')->error();
            return back();
        }
        $dokter->delete();
        flash('Data berhasil dihapus');
        return back();
    }

    public function laporan()
    {
    }
}
