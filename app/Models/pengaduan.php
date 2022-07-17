<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengaduan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id_pengaduan'];
    protected $primaryKey = 'id_pengaduan';
    protected $with = ['warga', 'kategori_pengaduans'];
    // protected $casts = [
    //     'created_at' => "datetime:Y-m-d\TH:i:s",
    //     'updated_at' => "datetime:Y-m-d\TH:i:s",
    // ];


    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik', 'nik')->select('id_warga', 'nik', 'nama_lengkap', 'pekerjaan');
    }
    public function getRouteKeyName()
    {
        return 'id_pengaduan';
    }
    public function kategori_pengaduans()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_pengaduan', 'id_kategori_pengaduan');
    }

    public function scopeShowOn($query)
    {
        return $query->where('ditampilkan', 1);
    }
}
