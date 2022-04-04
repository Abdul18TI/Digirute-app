<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;

    protected $guarded = ['id_pengaduan'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
