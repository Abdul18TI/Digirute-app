<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $guarded = ['id_rw'];

    public function rt()
    {
        return $this->hasMany(rt::class);
    }
}
