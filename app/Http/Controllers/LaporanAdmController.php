<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanAdmController extends Controller
{
    public function index()
    {
        $request = request();
        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $tanggal_awal = $request->tanggal_awal;
            $tanggal_akhir = $request->tanggal_akhir;
            $data['adm'] = \App\Models\Administrasi::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->get();
            return view('laporanadm_index', $data);
        } else {
            return view('laporanadm_form');
        }
    }
}
