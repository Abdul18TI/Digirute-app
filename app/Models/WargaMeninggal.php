<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaMeninggal extends Model
{
    use HasFactory;
    protected $table = 'warga_meninggal';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['tgl_kematian', 'tgl_lahir_pelapor'];
    protected $with = ['wargas'];
    public function wargas()
    {
        return $this->belongsTo(Warga::class, 'warga', 'id_warga')->select('nik','id_warga', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat');
        // return $this->belongsTo(rt::class);
    }
    // public function getRouteKeyName()
    // {
    //     return 'id_warga';
    // }

}
