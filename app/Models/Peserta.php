<?php

namespace App\Models;

use App\Models\Acara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $guarded = [];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }

}
