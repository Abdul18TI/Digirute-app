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
    // protected $with = ['rts'];


    public function fasilitas_umumss()
    {
        return $this->belongsTo(Kategori_fasilitas_umum::class, 'kategori_fasilitas_umum', 'id_kategori_fasilitas');
    }
    public function rts()
    {
        return $this->belongsTo(rt::class, 'rt', 'id_rt')->select('id_rt', 'no_rt', 'id_rw');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->where('fasilitas_umum', 'like', '%' . $search . '%')
                ->orWhere('deskripsi_fasilitas', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('fasilitas_umumss', function ($query) use ($category) {
                $query->where('kategori_fasilitas_umum', $category);
            });
        });
    }
}
