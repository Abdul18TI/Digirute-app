<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = "tb_kelurahan";
    protected $primaryKey = 'id_kel';
    protected $guarded = ['id_kel'];

    public function kelurahanss()
    {
        return $this->hasMany(Warga::class,);
    }
}
