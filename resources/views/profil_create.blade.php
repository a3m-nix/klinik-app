@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">PROFIL SAYA - {{ strtoupper(auth()->user()->name) }}</div>
        <div class="card-body">
            <form action="/profil" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="form-group mt-1">
                    <label for="name">Nama</label>
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" autofocus>
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" value="{{ $user->email }}">
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password" value="{{ old('password') }}">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
@endsection
