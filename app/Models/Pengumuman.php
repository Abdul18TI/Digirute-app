<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "pengumuman";
    protected $primaryKey = 'id_pengumuman';
    protected $guarded = ['id_pengumuman'];

    public function getRouteKeyName()
    {
        return 'id_pengumuman';
    }
}
