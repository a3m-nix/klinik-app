@extends('layouts.sbadmin2')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $judul }}</div>
                    <div class="card-body">
                        <a href="/dokter/create" class="btn btn-primary mb-2">Tambah Dokter</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Tanggal Buat</th>
                                    <th width="16%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->kode_dokter }}</td>
                                        <td>
                                            <div class="row">
                                                @if ($item->foto)
                                                    <div class="col-md-4">
                                                        <a href="{{ Storage::url($item->foto) }}" target="blank">
                                                            <img src="{{ Storage::url($item->foto) }}" alt="Foto"
                                                                width="100px" height="100px"
                                                                class="img img-thumbnail align-text-top">
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="col-md-8">
                                                    <div>Nama: {{ $item->nama_dokter }}</div>
                                                    <div>Spesialis: {{ $item->spesialis }}</div>
                                                    <div>Nomor HP: {{ $item->nomor_hp }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="/dokter/{{ $item->id }}/edit" class="btn btn-primary">
                                                Edit
                                            </a>
                                            <form action="/dokter/{{ $item->id }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
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
