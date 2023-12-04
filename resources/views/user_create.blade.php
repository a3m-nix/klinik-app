@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">Buat User</div>
        <div class="card-body">
            <form action="/user" method="POST">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" autofocus>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Email / Username</label>
                        <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group mt-1">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <option value="operator" @selected(old('role') == 'operator')> Operator</option>
                        <option value="admin" @selected(old('role') == 'admin')> Admin </option>
                    </select>
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
