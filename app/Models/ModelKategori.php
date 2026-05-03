<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'namakategori',
        'deskripsi'
    ];

    public function produk()
    {
        return $this->hasMany(ModelProduk::class, 'kategoriid', 'id');
    }
}