<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecelakaan extends Model
{
    //
    protected $table = "kecelakaans";

    protected $fillable = [
        'kejadian',
        'lokasi',
        'tanggal',
        'waktu',
        'atasan_langsung_korban',
        'saksi',
        'akibat',
        'jumlah_korban',
        'kronologi',
        'resiko_keparahan',
        'resiko_kemungkinan',
        'photo',
        'tindakan',
        'penanggung_jawab',
        'status',
    ];

    public function korbans()
    {
        return $this->hasMany('App\KecelakaanKorban');
    }
}
