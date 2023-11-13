@extends('layouts.sbadmin2')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $judul }}</div>
                    <div class="card-body">
                        {!! Form::model($pasien, [
                            'route' => $route,
                            'method' => $method,
                        ]) !!}
                        <div class="form-group mt-1">
                            <label for="noktp">Nomor KTP</label>
                            {!! Form::text('noktp', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('noktp') }}</span>
                        </div>
                        <div class="form-group mt-1">
                            <label for="kode_pasien">Kode Pasien</label>
                            {!! Form::text('kode_pasien', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="nama_pasien">Nama Pasien</label>
                            {!! Form::text('nama_pasien', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            {!! Form::select('jenis_kelamin', $list_jk, null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                        </div>
                        <label for="ss">Status Menikah</label>
                        <div class="form-check ml-3">
                            {!! Form::radio('status', 'Sudah Menikah', null, [
                                'class' => 'form-check-input',
                                'id' => 'sm',
                            ]) !!}
                            <label class="form-check-label" for="sm">
                                Sudah Menikah
                            </label>
                        </div>
                        <div class="form-check ml-3">
                            {!! Form::radio('status', 'Belum Menikah', null, [
                                'class' => 'form-check-input',
                                'id' => 'bm',
                            ]) !!}
                            <label class="form-check-label" for="bm">
                                Belum Menikah
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            {!! Form::textarea('alamat', null, [
                                'class' => 'form-control',
                                'rows' => 3,
                            ]) !!}
                        </div>

                        <div class="form-group mt-2">
                            {!! Form::submit($tombol, ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
