<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatKebakaranHydrant extends Model
{
    //
    protected $table = "alat_kebakaran_hydrants";

    protected $fillable = [
        'kode',
        'lokasi'
    ];

    public function inspeksi()
    {
        return $this->hasMany('App\KebakaranAktifHydrant');
    }
}
