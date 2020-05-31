<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KebakaranAktifHydrant extends Model
{
    //
    protected $table = 'kebakaran_aktif_hydrants';

    protected $fillable = [
        'id_hydrant',
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
        'j',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'q',
    ];

    public function alat()
    {
        return $this->belongsTo('App\AlatKebakaranHydrant', 'id_hydrant', 'id');
    }
}
