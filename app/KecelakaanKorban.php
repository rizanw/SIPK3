<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KecelakaanKorban extends Model
{
    //
    protected $table = "kecelakaan_korbans";

    public $timestamps = false;

    protected $fillable = [
        'id_inspeksi',
        'nama',
        'usia',
        'jenis_kelamin',
    ];

    public function kecelakaan()
    {
        return $this->belongsTo('App\Kecelakaan', 'id_inspeksi', 'id');
    }
}
