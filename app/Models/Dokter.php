<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the administrasi for the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function administrasi(): HasMany
    {
        return $this->hasMany(Administrasi::class);
    }

    /**
     * Get the user that owns the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the poli for the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poli(): HasMany
    {
        return $this->hasMany(Poli::class);
    }
}
