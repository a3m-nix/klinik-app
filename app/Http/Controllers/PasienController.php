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
            $data['pasien'] = \App\Models\Pasien::paginate(10);
        }
        $data['judul'] = 'Data-data Pasien';
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pasien'] = new \App\Models\Pasien();
        $data['route'] = 'pasien.store';
        $data['method'] = 'post';
        $data['tombol'] = 'Simpan';
        $data['judul'] = 'Tambah Data';
        $data['list_jk'] = [
            'Pria' => 'Pria',
            'Wanita' => 'Wanita',
        ];
        return view('pasien_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);
        $dokter = new \App\Models\Pasien();
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
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        $data['route'] = ['dokter.update', $id];
        $data['method'] = 'post';
        $data['tombol'] = 'Simpan';
        $data['judul'] = 'Tambah Data';
        $data['list_sp'] = [
            'Umum' => 'Umum',
            'Gigi' => 'Gigi',
            'Kandungan' => 'Kandungan',
            'Anak' => 'Anak',
            'Bedah' => 'Bedah',
        ];
        return view('dokter_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter,' . $id,
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',
        ]);
        $dokter = \App\Models\Pasien::findOrFail($id);
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
        $dokter = \App\Models\Pasien::findOrFail($id);
        $dokter->delete();
        flash('Data berhasil dihapus');
        return back();
    }

    public function laporan()
    {
    }
}
