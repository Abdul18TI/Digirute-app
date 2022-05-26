<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rt extends Authenticatable
{
    use HasFactory;

    protected $table = 'rts';
    protected $primaryKey = 'id_rt';
    protected $guarded = ['id_rt'];

    public function getRouteKeyName()
    {
        return 'id_rt';
    }

    public function _warga()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->hasMany(Warga::class, 'rt', 'id_rt');
    }
    public function rw_rel()
    {
        //belongsTo(namamodel, foreign key tabel rt, primary key tabel sendiri)
        return $this->hasOne(rw::class, 'id_rw', 'id_rw');
        // return $this->belongsTo(rw::class);
    }
}
