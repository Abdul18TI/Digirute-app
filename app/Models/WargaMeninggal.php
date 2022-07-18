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
    protected $with = ['wargas', 'surats'];
    public function wargas()
    {
        return $this->belongsTo(Warga::class, 'warga', 'id_warga')->select('nik','id_warga', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat','status_warga');
        // return $this->belongsTo(rt::class);
    }
    public function surats()
    {
        return $this->belongsTo(Surat::class, 'no_surat', 'id_surat')->select('id_surat', 'nomor_surat', 'status_surat');
    }
    public function rts()
    {
        return $this->belongsTo(rt::class, 'warga', 'id_warga');
        // return $this->belongsTo(rt::class);
    }
    // public function getRouteKeyName()
    // {
    //     return 'id_warga';
    // }

}
