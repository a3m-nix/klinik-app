@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">{{ $judul }}</div>
        <div class="card-body">
            <a href="/user/create" class="btn btn-primary mb-2">Tambah Data</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Nama</th>
                        <th>Username / Email</th>
                        <th>Tanggal Buat</th>
                        <th width="16%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="/user/{{ $item->id }}/edit" class="btn btn-primary">
                                    Edit
                                </a>
                                <form action="/user/{{ $item->id }}" method="POST" class="d-inline"
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
@endsection
