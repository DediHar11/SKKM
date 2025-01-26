<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestasikegiatan extends Model
{
    use HasFactory;
    protected $table = "prestasikegiatan";
    protected $primaryKey = "id";
    protected $fillable = ['id','prestasi_kegiatan'];

    public function kegiatan()
    {
        return $this->hasMany(kegiatan::class);
    }
}
