<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;

    protected $table = "kategori_kegiatan";
    protected $primaryKey = 'id_kategori_kegiatan';
    protected $guarded = ['id_kategori_kegiatan'];

    public function Kategori_kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
