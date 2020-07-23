<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintaince extends Model
{
    protected $table = "maintainces";

    protected $fillable = [
        'jenis',
        'id_kasus',
        'tanggal',
        'photo',
        'deskripsi',
    ];
}
