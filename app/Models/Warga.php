<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $guarded = ['id_warga'];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
