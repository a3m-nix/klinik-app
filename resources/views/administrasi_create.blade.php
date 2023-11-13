@extends('layouts.sbadmin2')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Administrasi
                    </div>
                    <div class="card-body">
                        <form action="{{ route('administrasi.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="kode_administrasi">Kode Administrasi</label>
                                <input type="text" name="kode_administrasi" class="form-control"
                                    value="{{ old('kode_administrasi') }}">
                                <span class="text-danger">{{ $errors->first('kode_administrasi') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                                <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="pasien_id">Pilih Pasien</label>
                                <select name="pasien_id" id="pasien_id" class="form-control">
                                    @foreach ($list_pasien as $id => $nama)
                                        <option value="{{ $id }}" @selected(old('pasien_id') == $id)>
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="dokter_id">Pilih Dokter</label>
                                <select name="dokter_id" id="dokter_id" class="form-control">
                                    @foreach ($list_dokter as $id => $nama)
                                        <option value="{{ $id }}" @selected(old('dokter_id') == $id)>
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('dokter_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="biaya">Biaya</label>
                                <input type="number" name="biaya" class="form-control" value="{{ old('biaya') }}">
                                <span class="text-danger">{{ $errors->first('biaya') }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
