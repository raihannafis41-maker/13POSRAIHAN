<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDetailPenjualan extends Model
{
    protected $table = 'detailpenjualan';

    protected $fillable = [
        'penjualanid',
        'produkid',
        'qty',
        'harga',
        'subtotal'
    ];
    public function produk()
    {
        return $this->belongsTo(ModelProduk::class, 'produkid', 'id');
    }
}
