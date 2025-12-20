<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'event_id'
    ];
}