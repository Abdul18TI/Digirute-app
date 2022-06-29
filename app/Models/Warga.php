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
    protected $with = ['pekerjaan', 'pekerjaans'];
    protected $dates = ['tgl_lahir'];


    public function getRouteKeyName()
    {
        return 'id_warga';
    }

    public function pekerjaans()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan', 'nama_pekerjaan']);;
        // return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan','nama_pekerjaan']);
        // return $this->belongsTo(rt::class);
    }
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan', 'nama_pekerjaan']);
        // return $this->belongsTo(rt::class);
    }

    public function agamas()
    {
        return $this->belongsTo(Agama::class, 'agama', 'id_agama')->select(['id_agama', 'agama']);
        // return $this->belongsTo(rt::class);
    }
    // public function agama()
    // {
    //     return $this->belongsTo(Agama::class, 'agama', 'id_agama')->select(['id_pekerjaan', 'nama_pekerjaan']);
    //     // return $this->belongsTo(rt::class);
    // }
    public function pendidikans()
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

    public function identitas_rws()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(rw::class, 'id_warga', 'id_warga');
    }

    public function keluargas()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(rw::class, 'no_kk', 'no_kk');
    }

    public function rt_rel()
    {
        return $this->belongsTo(rt::class, 'rt', 'id_rt');
        // return $this->belongsTo(rt::class);
    }
}
