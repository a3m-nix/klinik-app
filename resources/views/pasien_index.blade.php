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
                        <div class="row mb-2">
                            <div class="col">
                                <form method="GET">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control"
                                            placeholder="Cari data pasien" value="{{ request('q') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Nomor HP</th>
                                    <th>Tanggal Buat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->kode_pasien }}</td>
                                        <td>{{ $item->nama_pasien }}</td>
                                        <td>{{ $item->nomor_hp }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            {!! Form::open([
                                                'route' => ['pasien.destroy', $item->id],
                                                'method' => 'delete',
                                                'style' => 'display:inline',
                                                'onsubmit' => 'return confirm("Apakah anda yakin?")',
                                            ]) !!}
                                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
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
