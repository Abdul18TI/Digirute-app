<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_umum extends Model
{
    use HasFactory;

    protected $table = "fasilitas_umums";
    protected $primaryKey = 'id_fasilitas_umum';
    protected $guarded = ['id_fasilitas_umum'];

    public function fasilitas_umumss()
    {
        return $this->belongsTo(Kategori_fasilitas_umum::class, 'kategori_fasilitas_umum', 'id_kategori_fasilitas_umum')->select(['id_fasilitas_umum', 'kategori_fasilitas']);
    }
}
