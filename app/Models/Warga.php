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
    protected $with = ['pekerjaan'];

    public function getRouteKeyName()
    {
        return 'id_warga';
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan','nama_pekerjaan']);;
        // return $this->belongsTo(rt::class);
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan', 'id_pendidikan')->select(['id_pendidikan', 'nama_pendidikan']);;
        // return $this->belongsTo(rt::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function rt_rel()
    {
        return $this->belongsTo(rt::class, 'rt', 'id_rt');
        // return $this->belongsTo(rt::class);
    }
}
