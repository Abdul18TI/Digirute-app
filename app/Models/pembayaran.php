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
    protected $with = ['wargas'];


    public function wargas()
    {
        return $this->belongsTo(Warga::class, 'id_warga')->select('id_warga', 'nik', 'nama_lengkap', 'pekerjaan');
    }

    public function iuran()
    {
        return $this->belongsTo(Iuran::class);
    }

    public function scopeWarga($query, $id_warga)
    {
        $query->where('id_warga', 1);
    }
    public function scopeIuran($query, $id_iuran)
    {
        $query->where('id_iuran', 1);
    }
}
