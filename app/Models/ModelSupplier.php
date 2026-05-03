<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSupplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = [
        'namasupplier',
        'nohp',
        'alamat',
    ];
}