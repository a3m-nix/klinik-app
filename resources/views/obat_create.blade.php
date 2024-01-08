@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">TAMBAH OBAT</div>
        <div class="card-body">
            <form action="/obat" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <label for="kode_obat">Kode Obat</label>
                            <input class="form-control" type="text" name="kode_obat" value="{{ old('kode_obat') }}"
                                autofocus>
                            <span class="text-danger">{{ $errors->first('kode_obat') }}</span>
                        </div>
                        <div class="form-group mt-1">
                            <label for="nama_obat">Nama Obat</label>
                            <input class="form-control" type="text" name="nama_obat" value="{{ old('nama_obat') }}"
                                autofocus>
                            <span class="text-danger">{{ $errors->first('nama_obat') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" class="form-control">
                                <option value="" {{ old('satuan') === null ? 'selected' : '' }} disabled hidden>
                                    Masukkan
                                    satuan</option>
                                <option value="botol" {{ old('satuan') === 'botol' ? 'selected' : '' }}>Botol</option>
                                <option value="tablet" {{ old('satuan') === 'tablet' ? 'selected' : '' }}>Tablet</option>
                                <option value="kapsul" {{ old('satuan') === 'kapsul' ? 'selected' : '' }}>Kapsul</option>
                                <option value="strip" {{ old('satuan') === 'strip' ? 'selected' : '' }}>Strip</option>
                                <option value="pcs" {{ old('satuan') === 'pcs' ? 'selected' : '' }}>Pcs</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('satuan') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="tipe">Tipe</label>
                            <select name="tipe" class="form-control">
                                <option value="" {{ old('tipe') === null ? 'selected' : '' }} disabled hidden>
                                    Masukkan
                                    tipe</option>
                                <option value="botol" {{ old('tipe') === 'botol' ? 'selected' : '' }}>Generik</option>
                                <option value="tablet" {{ old('tipe') === 'tablet' ? 'selected' : '' }}>Paten</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('tipe') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-1">
                            <label for="harga_beli">Harga Beli</label>
                            <input class="form-control" type="text" name="harga_beli" id="harga_beli"
                                value="{{ old('harga_beli') }}">
                            <span class="text-danger">{{ $errors->first('harga_beli') }}</span>
                        </div>
                        <div class="form-group mt-1">
                            <label for="harga_jual">Harga Jual</label>
                            <input class="form-control" type="text" name="harga_jual" id="harga_jual"
                                value="{{ old('harga_jual') }}">
                            <span class="text-danger">{{ $errors->first('harga_jual') }}</span>
                        </div>
                        <div class="form-group mt-1">
                            <label for="qty">QTY</label>
                            <input class="form-control" type="text" name="qty" value="{{ old('qty') }}"
                                autofocus>
                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                        </div>
                        <div class="form-group mt-1">
                            <label for="tanggal_expired">Tanggal Expired</label>
                            <input id="tanggal_expired" class="form-control" type="date" name="tanggal_expired"
                                value="{{ date('Y-m-d') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_expired') }}</span>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#harga_beli').on('input', function() {
            // Menghilangkan semua karakter selain angka
            let val = this.value.replace(/\D/g, '');

            // Menambahkan pemisah titik setiap 3 digit dari belakang
            val = val.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            // Menampilkan nilai dengan format Rp
            this.value = 'Rp' + val;
        });
    });

    $(document).ready(function() {
        $('#harga_jual').on('input', function() {
            // Menghilangkan semua karakter selain angka
            let val = this.value.replace(/\D/g, '');

            // Menambahkan pemisah titik setiap 3 digit dari belakang
            val = val.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            // Menampilkan nilai dengan format Rp
            this.value = 'Rp' + val;
        });
    });
</script> --}}
