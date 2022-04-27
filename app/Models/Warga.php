<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Warga extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'wargas';
    protected $primaryKey = 'id_warga';
    protected $guarded = ['id_warga'];

    public function getRouteKeyName()
    {
        return 'id_warga';
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
