<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $table = 'rws';
    protected $primaryKey = 'id_rw';
    protected $guarded = ['id_rw'];

    public function getRouteKeyName()
    {
        return 'id_rw';
    }

    public function identitas_rw()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(Warga::class, 'id_warga', 'id_warga');
    }
    public function rt_rel()
    {
        // return $this->hasMany(rt::class);
        return $this->hasMany(rt::class, 'id_rw', 'id_rw');
        // return $this->belongsToMany(rt::class, 'id_rw', 'id_rw');
    }
}
