@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">{{ $judul }}</div>
        <div class="card-body">
            <a href="/obat/create" class="btn btn-primary mb-2">Tambah Obat</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Tanggal Expired</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $item)
                            <tr>
                                <td>{{ $item->kode_obat }}</td>
                                <td>{{ $item->nama_obat }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>
                                    {{ $item->qty }}
                                    @if ($item->qty <= 0)
                                        <span class="badge bg-danger text-light">Habis</span>
                                    @else
                                        <span class="badge bg-primary text-light">Tersedia</span>
                                    @endif
                                    </span>
                                </td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>{{ $item->harga_jual }}</td>
                                <td>{{ $item->tanggal_expired ? \Carbon\Carbon::parse($item->tanggal_expired)->format('d-m-Y') : '' }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-info">
                                        Detail
                                    </a>
                                    <a href="" class="btn btn-primary">
                                        Edit
                                    </a>
                                    {{-- <form action="/dokter/{{ $item->id }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
