<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'deskripsi',
        'satuan',
        'tipe',
        'harga_beli',
        'harga_jual',
        'qty',
        'tanggal_expired',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
