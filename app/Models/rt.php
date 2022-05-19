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

    public function rw()
    {
        return $this->belongsTo(rw::class);
    }
}
