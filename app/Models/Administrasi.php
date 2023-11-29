<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = ['tanggal' => 'date:d-m-Y'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class)->withDefault([
            'nama_pasien' => 'Data sudah dihapus',
        ]);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class)->withDefault([
            'nama_dokter' => 'Data sudah dihapus',
        ]);
    }
}
