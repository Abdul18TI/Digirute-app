<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Warga extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'wargas';
    protected $primaryKey = 'id_warga';
    protected $guarded = ['id_warga'];

    public function getRouteKeyName()
    {
        return 'id_warga';
    }

    public function iuran()
    {
        return $this->belongsToMany(Iuran::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function rt_rel()
    {
        return $this->belongsTo(rt::class, 'rt', 'id_rt');
        // return $this->belongsTo(rt::class);
    }
}
