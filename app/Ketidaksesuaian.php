<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketidaksesuaian extends Model
{
    //
    protected $table = "ketidaksesuaians";

    protected $fillable = [
        'temuan',
        'tanggal',
        'kategori',
        'lokasi',
        'photo',
        'resiko_keparahan',
        'resiko_kemungkinan',
        'pic',
        'pelapor',
        'tindakan',
        'status',
    ];
}
