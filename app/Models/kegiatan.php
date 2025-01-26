<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatans";
    protected $primaryKey = "id";
    protected $fillable =[
        'id','nama_kegiatan_bhsindonesia','nama_kegiatan_bhsinggris','no_sertifikat', 'kategori_kegiatan_id','jenis_kegiatan_id','prestasi_kegiatan_id','point','kode_point','jenis_sertifikat','scan_sertifikat','status_validasi','nim','keterangan'];  //
    public function kategori_kegiatan()
    {
        return $this->belongsTo(kategorikegiatan::class);
    }
    public function jenis_kegiatan()
    {
        return $this->belongsTo(jeniskegiatan::class);
    }
    public function prestasi_kegiatan()
    {
        return $this->belongsTo(prestasikegiatan::class);
    }
}
