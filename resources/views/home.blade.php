@extends('layouts.sbadmin2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div>
                            <a href="/administrasi/create" class="btn btn-primary m-1">Buat Administrasi</a>
                            <a href="/pasien/create" class="btn btn-primary m-1">Tambah Pasien</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
