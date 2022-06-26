<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengumuman extends Model
{
    use HasFactory;

    protected $table = "kategori_pengumuman";
    protected $primaryKey = 'id_kategori_pengumuman';
    protected $guarded = ['id_kategori_pengumuman'];

    public function Kategori_pengumumans()
    {
        return $this->hasMany(Pengumuman::class);
    }
}
