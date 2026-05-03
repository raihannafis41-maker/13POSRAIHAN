<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'supplierid',
        'userid',
        'total',
        'tanggalpembelian'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function supplier()
    {
        return $this->belongsTo(ModelSupplier::class, 'supplierid', 'id');
    }

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid', 'id');
    }

    public function detailPembelian()
    {
        return $this->hasMany(ModelDetailPembelian::class, 'pembelianid', 'id');
    }
}