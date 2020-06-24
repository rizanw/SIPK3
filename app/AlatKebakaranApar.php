<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatKebakaranApar extends Model
{
    //
    protected $table = "alat_kebakaran_apars";

    protected $fillable = [
        'kode',
        'jenis',
        'tipe',
        'merk',
        'berat',
        'lokasi'
    ];


    public function inspeksi()
    {
        return $this->hasMany('App\KebakaranAktifApar');
    }
}
