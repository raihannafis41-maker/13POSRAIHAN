<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPenjualan extends Model
{
    protected $table = 'penjualan';

    protected $fillable = [
        'kodeinvoice',
        'userid',
        'mejaid',
        'promoid',
        'pajakid',
        'subtotal',
        'diskon',
        'pajak',
        'total',
        'status',
        'tanggalpenjualan'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid', 'id');
    }

    public function meja()
    {
        return $this->belongsTo(ModelMeja::class, 'mejaid', 'id');
    }

    public function promo()
    {
        return $this->belongsTo(ModelPromo::class, 'promoid', 'id');
    }

    public function pajakData()
    {
        return $this->belongsTo(ModelPajak::class, 'pajakid', 'id');
    }

    public function detail()
    {
        return $this->hasMany(ModelDetailPenjualan::class, 'penjualanid', 'id');
    }

    public function pembayaran()
    {
        return $this->hasOne(ModelPembayaran::class, 'penjualanid', 'id');
    }
}