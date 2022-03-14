<?php

namespace App\Models;

use App\Models\Sesi;
use App\Models\Acara;
use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    protected $guarded = [];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
}
