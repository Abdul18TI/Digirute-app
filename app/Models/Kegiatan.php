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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('status_kegiatan', 1)
                ->where('nama_kegiatan', 'like', '%' . $search . '%')
                ->orWhere('isi_kegiatan', 'like', '%' . $search . '%');
        });
    }
}
