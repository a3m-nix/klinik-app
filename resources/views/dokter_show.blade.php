@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">Nama Dokter: {{ strtoupper($dokter->nama_dokter) }}</div>
        <div class="card-body">
            <h5>Data Dokter : {{ strtoupper($dokter->nama_dokter) }}</h5>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ Storage::url($dokter->foto) }}" target="blank">
                        <img src="{{ Storage::url($dokter->foto) }}" alt="Foto" width="200px"
                            class="img img-thumbnail align-text-top">
                    </a>
                </div>
                <div class="col-md-9">
                    <dl class="row">
                        <dt class="col-sm-2">Kode</dt>
                        <dd class="col-sm-10">: {{ $dokter->kode_dokter }}</dd>
                        <dt class="col-sm-2">Nama</dt>
                        <dd class="col-sm-10">: {{ $dokter->nama_dokter }}</dd>
                        <dt class="col-sm-2">Nomor HP</dt>
                        <dd class="col-sm-10">: {{ $dokter->nomor_hp }}</dd>
                        <dt class="col-sm-2">Spesialis</dt>
                        <dd class="col-sm-10">: {{ $dokter->spesialis }}</dd>
                        <dt class="col-sm-2">Username</dt>
                        <dd class="col-sm-10">: {{ $dokter->user->email }}</dd>
                    </dl>
                </div>
            </div>
            <a href="/dokter" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
