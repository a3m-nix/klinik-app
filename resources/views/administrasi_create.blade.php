@extends('layouts.sbadmin2')
@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Administrasi
        </div>
        <div class="card-body">
            <form action="{{ route('administrasi.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? date('Y-m-d') }}">
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="pasien_id">Pilih Pasien atau <a href="/pasien/create" target="blank">Buat
                                Baru</a></label>
                        <select name="pasien_id" id="pasien_id" class="form-control">
                            @foreach ($list_pasien as $item)
                                <option value="{{ $item->id }}" @selected(old('pasien_id') == $item->id)>
                                    {{ $item->kode_pasien }} - {{ $item->nama_pasien }} - {{ $item->jenis_kelamin }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="poli_id">Pilih Poli Tujuan</label>
                        <select name="poli_id" id="poli_id" class="form-control">
                            @foreach ($list_poli as $item)
                                <option value="{{ $item->id }}" @selected(old('poli_id') == $item->id)>
                                    Poli {{ $item->nama }} - Biaya
                                    {{ number_format($item->biaya, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('poli_id') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea name="keluhan" rows="3" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </div>
@endsection
