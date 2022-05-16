<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengaduan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id_pengaduan'];
    protected $primaryKey = 'id_pengaduan';

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
    public function getRouteKeyName()
    {
        return 'id_pengaduan';
    }
}
