<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLaporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'userid',
        'jenislaporan',
        'periodeawal',
        'periodeakhir',
        'totaldata'
    ];

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid', 'id');
    }
}