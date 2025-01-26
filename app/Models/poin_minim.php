<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poin_minim extends Model
{
    protected $table = "poin_minims";
    protected $primaryKey = "id";
    protected $fillable = ['id','point_minim','nim'];
}
