<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_fasilitas_umum extends Model
{
    use HasFactory;

    protected $table = "kategori_fasilitas_umums";
    protected $primaryKey = 'id_kategori_fasilitas';
    protected $guarded = ['id_kategori_fasilitas'];

    public function fasilitas_umum()
    {
        return $this->hasMany(Fasilitas_umum::class);
    }
}
