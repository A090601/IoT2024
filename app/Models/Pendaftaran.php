<?php

namespace App\Models;

use App\Models\Kplmanagement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $lable = 'pendaftarans';
    protected $fillable = ['nama', 'no_antrian', 'no_rekmed', 'status_pasien', 'status_panggilan', 'dokter_id'];


    public function Dokter()
    {
        return $this->belongsTo(Kplmanagement::class, 'dokter_id', 'id');
    }

    public function MonitorCetak()
    {
        return $this->hasMany(MonitorCetak::class, 'pendaftaran_id', 'id');
    }

    public function Obat()
    {
        return $this->hasMany(Obat::class, 'pendaftaran_id', 'id');
    }
}
