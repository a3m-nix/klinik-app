<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Administrasi</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background: white;">
    <div class="container-fluid">
        <div class="col-md-12">
            <h3 class="text-center">LAPORAN ADMINISTRASI</h3>
            <div class="text-center">Tanggal Laporan : {{ request('tanggal_awal') }} -
                {{ request('tanggal_akhir') }}</div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th width="38%">Data Pasien</th>
                            <th>Keluhan</th>
                            <th>Biaya</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adm as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <dl class="row">
                                        <dt class="col-md-4">Nama Pasien</dt>
                                        <dd class="col-md-8">: {{ $item->pasien->nama_pasien }}</dd>

                                        <dt class="col-md-4">Nomor HP</dt>
                                        <dd class="col-md-8">: {{ $item->pasien->nomor_hp }}</dd>

                                        <dt class="col-md-4">Tujuan Poli</dt>
                                        <dd class="col-md-8">: {{ $item->poli }}</dd>

                                        <dt class="col-md-4">Dokter</dt>
                                        <dd class="col-md-8">: {{ $item->dokter->nama_dokter }}</dd>
                                    </dl>

                                </td>
                                <td>
                                    <div><strong>Keluhan</strong>: {{ $item->keluhan }}</div>
                                    <div>
                                        <strong>Diagnosa:</strong>
                                        {{ $item->diagnosis }}
                                    </div>
                                </td>
                                <td>Rp. {{ number_format($item->biaya, 0, ',', '.') }}</td>
                                <td>
                                    <span
                                        class="badge badge-pill badge-{{ $item->status == 'baru' ? 'primary' : 'success' }}"
                                        style="font-size: 100% !important;color:black">{{ $item->status }}</span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
