<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class rw extends Authenticatable 
{
    use HasFactory;

    protected $table = 'rws';
    protected $primaryKey = 'id_rw';
    protected $guarded = ['id_rw'];
    protected $dates = ['tgl_awal_jabatan_rw', 'tgl_akhir_jabatan_rw'];

    public function getRouteKeyName()
    {
        return 'id_rw';
    }

    public function identitas_rw()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(Warga::class, 'id_warga', 'id_warga');
    }

    public function keluarga()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(Warga::class, 'no_kk', 'no_kk');
    }
    public function rt_rel()
    {
        // return $this->hasMany(rt::class);
        return $this->hasMany(rt::class, 'id_rw', 'id_rw');
        // return $this->belongsToMany(rt::class, 'id_rw', 'id_rw');
    }
}
