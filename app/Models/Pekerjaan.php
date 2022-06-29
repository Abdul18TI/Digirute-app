<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaans';
    protected $primaryKey = 'id_pekerjaan';
    protected $guarded = ['id_pekerjaan'];

    public function getRouteKeyName()
    {
        return 'id_pekerjaan';
    }

    public function Pekerjaans()
    {
        return $this->hasMany(Warga::class, 'pekerjaan', 'id_pekerjaan');
    }
}
