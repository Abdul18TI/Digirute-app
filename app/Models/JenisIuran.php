<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIuran extends Model
{
    use HasFactory;

    protected $table = "jenis_iuran";
    protected $primaryKey = 'id_jenis_iuran';
    protected $guarded = ['id_jenis_iuran'];

    public function iuran()
    {
        return $this->hasMany(iuran::class);
    }
}
