<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Warga extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'wargas';
    protected $primaryKey = 'id_warga';
    protected $guarded = ['id_warga'];
    protected $with = ['pekerjaan', 'pekerjaans', 'agamas', 'rt_rel', 'rw_rel'];
    protected $dates = ['tgl_lahir', 'tgl_akhir_passport', 'tgl_keluar_kk', 'tgl_perkawinan', 'tgl_cerai'];


    public function getRouteKeyName()
    {
        return 'id_warga';
    }

    public function pekerjaans()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan', 'nama_pekerjaan']);;
        // return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan','nama_pekerjaan']);
        // return $this->belongsTo(rt::class);
    }
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan')->select(['id_pekerjaan', 'nama_pekerjaan']);
        // return $this->belongsTo(rt::class);
    }

    public function agamas()
    {
        return $this->belongsTo(Agama::class, 'agama', 'id_agama')->select(['id_agama', 'agama']);
        // return $this->belongsTo(rt::class);
    }
    public function golongan_darahs()
    {
        return $this->belongsTo(GolonganDarah::class, 'golongan_darah', 'id')->select(['id', 'golongan_darah']);
        // return $this->belongsTo(rt::class);
    }
    // public function agama()
    // {
    //     return $this->belongsTo(Agama::class, 'agama', 'id_agama')->select(['id_pekerjaan', 'nama_pekerjaan']);
    //     // return $this->belongsTo(rt::class);
    // }
    public function pendidikans()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan', 'id_pendidikan')->select(['id_pendidikan', 'nama_pendidikan']);;
        // return $this->belongsTo(rt::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function keluargas()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(rw::class, 'no_kk', 'no_kk');
    }

    public function rt_rel()
    {
        return $this->belongsTo(rt::class, 'rt', 'id_rt');
    }
    public function rw_rel()
    {
        return $this->belongsTo(rw::class, 'rw', 'id_rw');
    }
    public function identitas_rws()
    {
        //hasMany(namamodel, foreign key tabel warga, primary key tabel sendiri)
        return $this->belongsTo(rw::class, 'rw', 'id_rw');
    }

    public function kabupatens()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten', 'id_kab')->select(['id_kab', 'nama']);;
        // return $this->belongsTo(rt::class);
    }

    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan', 'id_kec')->select(['id_kec', 'nama']);;
        // return $this->belongsTo(rt::class);
    }

    public function kelurahans()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan', 'id_kel')->select(['id_kel', 'nama']);;
        // return $this->belongsTo(rt::class);
    }

    public function provinsis()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id_prov')->select(['id_prov', 'nama']);;
        // return $this->belongsTo(rt::class);
    }

    public function hubungans()
    {
        return $this->belongsTo(Status_hubungan::class, 'status_hubungan_dalam_keluarga', 'id_status_hubungan')->select(['id_status_hubungan', 'status_hubungan']);;
        // return $this->belongsTo(rt::class);
    }

    public function surats()
    {
        return $this->hasMany(Surat::class, 'pengaju', 'id_warga');
    }
}
