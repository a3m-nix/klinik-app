@extends('layouts.sbadmin2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Poli</th>
                                    <th>Nama Dokter</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($administrasi as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->kode_administrasi }}</td>
                                        <td>{{ $item->tanggal->format('d F Y') }}</td>
                                        <td>{{ $item->pasien->nama_pasien }}</td>
                                        <td>{{ $item->poli }}</td>
                                        <td>{{ $item->dokter->nama_dokter }}</td>
                                        <td>Rp. {{ number_format($item->biaya, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('administrasi.edit', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            <form action="{{ route('administrasi.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
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
