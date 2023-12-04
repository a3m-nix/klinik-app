@extends('layouts.sbadmin2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">EDIT DOKTER {{ $dokter->nama_dokter }}</div>
                    <div class="card-body">
                        <form action="/dokter/{{ $dokter->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mt-1">
                                <label for="nama_dokter">Nama Dokter</label>
                                <input class="form-control" type="text" name="nama_dokter"
                                    value="{{ $dokter->nama_dokter ?? old('nama_dokter') }}">
                                <span class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="foto">Foto Dokter</label>
                                <input class="form-control" type="file" name="foto" value="{{ old('foto') }}">
                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                            </div>
                            @if ($dokter->foto)
                                <img src="{{ Storage::url($dokter->foto) }}" width="100px" height="100px"
                                    alt="foto dokter">
                            @endif
                            <div class="form-group mt-3">
                                <label for="spesialis">Spesialis</label>
                                <select name="spesialis" class="form-control">
                                    <option value="mata" @selected($dokter->spesialis == 'mata')> Spesialis Mata</option>
                                    <option value="tht" @selected($dokter->spesialis == 'tht')> Spesialis THT</option>
                                    <option value="jantung" @selected($dokter->spesialis == 'jantung')>
                                        Spesialis Jantung
                                    </option>
                                    <option value="paru" @selected($dokter->spesialis == 'paru')> Spesialis Paru </option>
                                </select>
                                <span class="text-danger">{{ $errors->first('spesialis') }}</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="nomor_hp">Nomor HP</label>
                                <input class="form-control" type="text" name="nomor_hp"
                                    value="{{ $dokter->nomor_hp ?? old('nomor_hp') }}">
                                <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
