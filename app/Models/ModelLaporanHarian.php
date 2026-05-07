<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLaporanHarian extends Model
{
    protected $table = 'laporanharian';

    protected $fillable = [
        'userid',
        'tanggal',
        'totaltransaksi',
        'totalpendapatan',
        'totaldiskon',
        'totalpajak'
    ];

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid', 'id');
    }
}