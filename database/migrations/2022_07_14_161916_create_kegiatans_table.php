<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan_bhsindonesia');
            $table->string('nama_kegiatan_bhsinggris');
            $table->string('no_sertifikat');
            $table->string('kategori_kegiatan_id');
            $table->string('jenis_kegiatan_id');
            $table->string('prestasi_kegiatan_id')->nullable();
            $table->string('point')->nullable();
            $table->string('kode_point');
            $table->string('jenis_sertifikat');
            $table->string('scan_sertifikat');
            $table->boolean('status_validasi');
            $table->string('nim');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}
