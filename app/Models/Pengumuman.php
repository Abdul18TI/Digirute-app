<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = "pengumuman";
    protected $primaryKey = 'id_pengumuman';
    protected $guarded = ['id_pengumuman'];
    protected $dates = ['tgl_terbit'];

    public function Kategori_pengumuman()
    {
        return $this->belongsTo(KategoriPengumuman::class, 'kategori_pengumuman', 'id_kategori_pengumuman')->select(['id_kategori_pengumuman', 'nama_kategori_pengumuman']);
        // return $this->belongsTo(rt::class);
    }
}
