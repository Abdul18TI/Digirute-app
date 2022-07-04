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

    public function Kategori_pengumumans()
    {
        return $this->belongsTo(KategoriPengumuman::class, 'kategori_pengumuman', 'id_kategori_pengumuman')->select(['id_kategori_pengumuman', 'nama_kategori_pengumuman']);
        // return $this->belongsTo(rt::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->where('judul_pengumuman', 'like', '%' . $search . '%')
                ->orWhere('isi_pengumuman', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('Kategori_pengumumans', function ($query) use ($category) {
                $query->where('kategori_pengumuman', $category);
            });
        });
    }
}
