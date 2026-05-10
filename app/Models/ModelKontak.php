<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = [
        'nama',
        'email',
        'subjek',
        'pesan',
        'tanggal'
    ];
}