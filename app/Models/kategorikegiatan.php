<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorikegiatan extends Model
{
    use HasFactory;
    protected $table = "kategorikegiatan";
    protected $primaryKey = "id";
    protected $fillable = ['id','kategori_kegiatan'];

    public function kegiatan()
    {
        return $this->hasMany(kegiatan::class);
    }
}
