<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    use HasFactory;

    protected $table = 'golongan_darahs';
    protected $primaryKey = 'id_goldar';
    protected $guarded = ['id_goldar'];

    public function getRouteKeyName()
    {
        return 'id_goldar';
    }
}
