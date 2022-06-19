<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iuran extends Model
{
    use HasFactory;

    protected $guarded = ['id_iuran'];
    protected $table = "iurans";
    protected $primaryKey = 'id_iuran';

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function jenis_iurans()
    {
        return $this->belongsTo(JenisIuran::class, 'jenis_iuran', 'id_jenis_iuran');
    }
}
