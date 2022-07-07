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
        return $this->belongsTo(Kategori_fasilitas_umum::class, 'kategori_fasilitas_umum', 'id_kategori_fasilitas');
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? false, function ($query, $search) {
    //         return $query
    //             ->where('judul_pengumuman', 'like', '%' . $search . '%')
    //             ->orWhere('isi_pengumuman', 'like', '%' . $search . '%');
    //     });

    //     $query->when($filters['category'] ?? false, function ($query, $category) {
    //         return $query->whereHas('Kategori_pengumumans', function ($query) use ($category) {
    //             $query->where('kategori_pengumuman', $category);
    //         });
    //     });
    // }
}
