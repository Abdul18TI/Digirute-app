<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaMiskin extends Model
{
    use HasFactory;
    protected $table = 'warga_miskin';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['wargas'];
    public function wargas()
    {
        return $this->belongsTo(Warga::class, 'warga', 'id_warga')->select('nik', 'id_warga', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat', 'status_warga');
    }
}
