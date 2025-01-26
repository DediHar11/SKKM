<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jeniskegiatan extends Model
{
    use HasFactory;
    protected $table = "jeniskegiatan";
    protected $primaryKey = "id";
    protected $fillable = ['id','jenis_kegiatan'];

    public function kegiatan()
    {
        return $this->hasMany(kegiatan::class);
    }
}
