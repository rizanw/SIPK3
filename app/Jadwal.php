<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $table = "jadwals";

    protected $fillable = [
        'jadwal',
        'tim',
        'deskripsi',
    ];
}
