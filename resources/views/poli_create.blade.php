@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">{{ $judul }}</div>
        <div class="card-body">
            <form action="/poli" method="POST">
                @method('POST')
                @csrf
                <div class="row mt-2">
                    <div class="col-md-6 form-group ">
                        <label for="nama">Nama Poli</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" autofocus />
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>
                    <div class="col-md-6 form-group ">
                        <label for="biaya">Biaya</label>
                        <input type="text" name="biaya" class="form-control" value="{{ old('biaya') }}" />
                        <span class="text-danger">{{ $errors->first('biaya') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Poli</label>
                    <textarea name="deskripsi" rows="3" class="form-control"></textarea>
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                </div>
                <div class="form-group mt-2">
                    <label for="dokter_id">Pilih Dokter</label>
                    <select name="dokter_id" class="form-control">
                        @foreach ($list_dokter as $item)
                            <option value="{{ $item->id }}">
                                {{ "{$item->nama_dokter} - Spesialis {$item->spesialis}" }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('dokter_id') }}</span>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/poli" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
