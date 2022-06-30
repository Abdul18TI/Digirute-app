<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = "tb_kabupaten";
    protected $primaryKey = 'id_kab';
    protected $guarded = ['id_kab'];

    public function kabupaten()
    {
        return $this->hasMany(Warga::class);
    }
}
