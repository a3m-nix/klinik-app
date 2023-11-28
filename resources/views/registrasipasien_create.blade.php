@extends('layouts.medilab')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        PENDAFTARAN PASIEN
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registrasipasien.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form-group mt-2">
                                <label for="noktp">Nomor KTP</label>
                                <input type="text" name="noktp" class="form-control" value="{{ old('noktp') }}" />
                                <span class="text-danger">{{ $errors->first('noktp') }}</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="kode_pasien">Kode Pasien</label>
                                <input type="text" name="kode_pasien" class="form-control"
                                    value="{{ old('kode_pasien') }}" />
                                <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama_pasien">Nama Pasien</label>
                                <input type="text" name="nama_pasien" class="form-control"
                                    value="{{ old('nama_pasien') }}" />
                                <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    @foreach ($list_jk as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('jenis_kelamin') == $key ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>
                            <label for="ss">Status Menikah</label>
                            <div class="form-check ml-3">
                                <input type="radio" name="status" value="Sudah Menikah" class="form-check-input"
                                    id="sm" {{ old('status') == 'Sudah Menikah' ? 'checked' : '' }}>
                                <label class="form-check-label" for="sm">
                                    Sudah Menikah
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="radio" name="status" value="Belum Menikah" class="form-check-input"
                                    id="bm" {{ old('status') == 'Belum Menikah' ? 'checked' : '' }}>
                                <label class="form-check-label" for="bm">
                                    Belum Menikah
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
                            </div>


                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">DAFTAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
