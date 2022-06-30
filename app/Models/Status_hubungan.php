<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_hubungan extends Model
{
    use HasFactory;

    protected $table = "status_hubungans";
    protected $primaryKey = 'id_status_hubungan';
    protected $guarded = ['id_status_hubungan'];

    public function hubungan()
    {
        return $this->hasMany(Warga::class);
    }
}
