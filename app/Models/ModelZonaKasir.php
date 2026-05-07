<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelZonaKasir extends Model
{
    use HasFactory;

    protected $table = 'zonakasir';

    protected $fillable = [
        'userid',
        'statusaktif',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid');
    }
}