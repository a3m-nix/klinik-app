@extends('layouts.sbadmin2')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $judul }}</div>
                    <div class="card-body">
                        {!! Form::model($poli, [
                            'route' => $route,
                            'method' => $method,
                        ]) !!}
                        <div class="row mt-2">
                            <div class="col-md-6 form-group ">
                                <label for="nama">Nama Poli</label>
                                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                            <div class="col-md-6 form-group ">
                                <label for="biaya">Biaya</label>
                                {!! Form::number('biaya', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('biaya') }}</span>
                            </div>
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
                            {!! Form::submit($tombol, ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
