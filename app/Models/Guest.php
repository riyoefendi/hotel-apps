<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = "guests";
    protected $fillable = [
        'nama_tamu',
        'check_in',
        'check_out',
        'no_kamar',
        'email',
        'no_tel',
        'status_tamu',
        'alamat',
        'kebutuhan_khusus'
    ];
}
