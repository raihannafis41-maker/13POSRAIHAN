<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProduk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'kategoriid',
        'kodeproduk',
        'namaproduk',
        'hargajual',
        'satuan',
        'foto',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */
    public function kategori()
    {
        return $this->belongsTo(ModelKategori::class, 'kategoriid', 'id');
    }
}