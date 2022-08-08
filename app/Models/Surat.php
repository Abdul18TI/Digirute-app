<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_surat';
    protected $table = 'surat';
    protected $casts = [
        'propertie_surat' => 'json',
        // 'status_surat' => 'boolean'
    ];
    protected $guarded = ['id_surat'];
    // protected $fillable = ['nomor_surat', 'jenis_surat','status_surat', 'propertie_surat'];
    protected $with = ['wargas'];
    public function wargas()
    {
        return $this->belongsTo(Warga::class, 'pengaju', 'id_warga')->select('nik', 'no_kk', 'id_warga', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat', 'foto_warga');
    }

    public function rts()
    {
        return $this->belongsTo(rt::class, 'warga', 'id_warga');
        // return $this->belongsTo(rt::class);
    }
    public function rws()
    {
        return $this->belongsTo(rw::class, 'warga', 'id_warga');
        // return $this->belongsTo(rt::class);
    }
    public function setPropertieSuratAttribute($value)
    {
        $this->attributes['propertie_surat'] = json_encode($value);
    }

    public function getPropertieSuratAttribute($value)
    {
        return $this->attributes['propertie_surat'] = json_decode($value);
    }
    // public function getJenisSuratAttribute($value)
    // {
    //     return strtoupper($value);
    // }
}
