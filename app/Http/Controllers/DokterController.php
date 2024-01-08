<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dokter'] = \App\Models\Dokter::latest()->get();
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
            'password' => 'required',
            'nomor_hp' => 'required|numeric|unique:dokters,nomor_hp',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:8048',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'tiktok' => 'required'

        ]);
        $kodeQuery = \App\Models\Dokter::orderBy('id', 'desc')->first();
        $kode = 'D0001';
        if ($kodeQuery) {
            $kode = 'D' . sprintf('%04d', $kodeQuery->id + 1);
        }

        DB::beginTransaction();
        try {
            //simpan data dokter sebagai data user
            $user = new \App\Models\User();
            $user->name = $validasiData['nama_dokter'];
            $user->email = $validasiData['nomor_hp'] . '@dokter.com';
            $user->password = bcrypt($request->password);
            $user->role = 'dokter';
            $user->save();

            $dokter = new \App\Models\Dokter();

            if ($request->hasFile('foto')) {
                //buang foto dari validasi data
                unset($validasiData['foto']);
                $path = $request->file('foto')->store('public/foto_dokter');
                $dokter->foto = $path;
            }
            $dokter->user_id = $user->id;
            $dokter->kode_dokter = $kode;
            $dokter->nama_dokter = $request->nama_dokter;
            $dokter->spesialis = $request->spesialis;
            $dokter->nomor_hp = $request->nomor_hp;
            $dokter->twitter = $request->twitter;
            $dokter->facebook = $request->facebook;
            $dokter->instagram = $request->instagram;
            $dokter->tiktok = $request->tiktok;
            $dokter->save();
            DB::commit();
            flash('Data berhasil disimpan');
            return back();
        } catch (\Throwable $e) {
            DB::rollback();
            flash('Ops... Terjadi kesalahan,' . $e->getMessage())->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['dokter'] = \App\Models\Dokter::findOrFail($id);
        return view('dokter_show', $data);
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
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'tiktok' => 'required',
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
        return redirect('/dokter');
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
