<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_event',
        'tanggal',
    ];

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'event_id');
    }
}
