@extends('layouts.sbadmin2')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="1%">ID</th>
                                    <th>Nama Poli</th>
                                    <th>Dokter</th>
                                    <th>Biaya</th>
                                    <th width="16%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poli as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->dokter->nama_dokter }}</td>
                                        <td>{{ number_format($item->biaya, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('poli.edit', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            {!! Form::open([
                                                'route' => ['poli.destroy', $item->id],
                                                'method' => 'delete',
                                                'style' => 'display:inline',
                                            ]) !!}
                                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger ml-1']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
