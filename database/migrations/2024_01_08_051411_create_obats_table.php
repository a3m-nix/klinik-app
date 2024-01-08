<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode_obat')->unique();
            $table->string('nama_obat');
            $table->text('deskripsi')->nullable();
            $table->string('satuan');
            $table->string('tipe');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('qty');
            $table->date('tanggal_expired')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
