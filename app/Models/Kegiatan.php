<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = "kegiatan";
    protected $primaryKey = 'id_kegiatan';
    protected $guarded = ['id_kegiatan'];
    protected $dates = ['tgl_mulai_kegiatan', 'tgl_selesai_kegiatan'];

    public function Kategori_kegiatans()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_kegiatan', 'id_kategori_kegiatan')->select(['id_kategori_kegiatan', 'kategori_kegiatan']);
        // return $this->belongsTo(rt::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->where('nama_kegiatan', 'like', '%' . $search . '%')
                ->orWhere('isi_kegiatan', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('Kategori_kegiatans', function ($query) use ($category) {
                $query->where('kategori_kegiatan', $category);
            });
        });
    }
}
