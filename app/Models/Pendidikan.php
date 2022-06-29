<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikans';
    protected $primaryKey = 'id_pendidikan';
    protected $guarded = ['id_pendidikan'];

    public function getRouteKeyName()
    {
        return 'id_pendidikan';
    }

    public function Agamass()
    {
        return $this->hasMany(Warga::class);
    }
}
