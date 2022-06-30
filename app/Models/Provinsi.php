<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = "tb_provinsi";
    protected $primaryKey = 'id_prov';
    protected $guarded = ['id_prov'];

    public function provinsi()
    {
        return $this->hasMany(Warga::class);
    }
}
