<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    use HasFactory;

    protected $table = "kategori_pengaduan";
    protected $primaryKey = 'id_kategori_pengaduan';
    protected $guarded = ['id_kategori_pengaduan'];

    public function pengaduan()
    {
        return $this->hasMany(pengaduan::class);
    }
}
