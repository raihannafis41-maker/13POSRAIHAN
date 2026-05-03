<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDetailPembelian extends Model
{
    use HasFactory;

    protected $table = 'detailpembelian';

    protected $fillable = [
        'pembelianid',
        'bahanbakuid',
        'qty',
        'harga',
        'subtotal'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function pembelian()
    {
        return $this->belongsTo(ModelPembelian::class, 'pembelianid', 'id');
    }

    public function bahanbaku()
    {
        return $this->belongsTo(ModelBahanBaku::class, 'bahanbakuid', 'id');
    }
}