<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLaporanBulanan extends Model
{
    protected $table = 'laporanbulanan';

    protected $fillable = [
        'userid',
        'bulan',
        'tahun',
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