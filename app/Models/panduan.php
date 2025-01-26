<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panduan extends Model
{
    protected $table = "panduans";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama_file','panduan_file','download'];
}
