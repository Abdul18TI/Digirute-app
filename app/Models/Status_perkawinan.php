<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_perkawinan extends Model
{
    use HasFactory;

    protected $table = "status_perkawinans";
    protected $primaryKey = 'id_status_perkawinan';
    protected $guarded = ['id_status_perkawinan'];

    public function perkawinan()
    {
        return $this->hasMany(Warga::class);
    }
}
