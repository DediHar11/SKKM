<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    protected $table = "prodi";
    protected $primaryKey = "id";
    protected $fillable = ['id','prodi'];

    public function prodi()
    {
        return $this->hasMany(User::class);
    }
}
