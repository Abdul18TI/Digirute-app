<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = "agama";
    protected $primaryKey = 'id_agama';
    protected $guarded = ['id_agama'];

    public function Agamas()
    {
        return $this->hasMany(Warga::class);
    }
}
