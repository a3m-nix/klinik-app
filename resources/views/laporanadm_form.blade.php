@extends('layouts.sbadmin2')

@section('content')
    <style>
        dd {
            margin-bottom: 0;
        }

        dl {
            margin-bottom: 0;
        }
    </style>
    <div class="card">
        <div class="card-header">
            LAPORAN DATA ADMINISTRASI
        </div>
        <div class="card-body">
            <form action="/laporan/administrasi" method="GET" target="_blank">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                            value="{{ now()->subMonth(1)->format('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                            value="{{ now()->format('Y-m-d') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Generate Laporan</button>
            </form>
        </div>
    </div>
@endsection
