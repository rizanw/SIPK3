<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KebakaranAktifApar extends Model
{
    //
    protected $table = 'kebakaran_aktif_apars';

    protected $fillable = [
        'id_apar',
        'tanggal_inspeksi',
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
    ];

    public function alat()
    {
        return $this->belongsTo('App\AlatKebakaranApar', 'id_apar', 'id');
    }
}
