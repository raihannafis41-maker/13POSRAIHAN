<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelMeja extends Model
{
    protected $table = 'meja';

    protected $fillable = [
        'nomormeja',
        'kapasitas',
        'status'
    ];
}