<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rt extends Model
{
    use HasFactory;

    protected $guarded = ['id_rt'];

    public function rw()
    {
        return $this->belongsTo(rw::class);
    }
}
