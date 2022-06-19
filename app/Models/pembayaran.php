<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = ['id_pembayaran'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function iuran()
    {
        return $this->belongsTo(Iuran::class);
    }
}
