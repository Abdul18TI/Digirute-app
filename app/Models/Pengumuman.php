<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = "pengumuman";
    protected $primaryKey = 'id_pengumuman';
    protected $guarded = ['id_pengumuman'];
    protected $dates = ['tgl_terbit'];
}
