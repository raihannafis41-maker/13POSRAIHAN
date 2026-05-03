<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahanbaku';

    protected $fillable = [
        'kodebahan',
        'namabahan',
        'stok',
        'satuan',
        'hargabeli'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function stok()
    {
        return $this->hasOne(ModelStok::class, 'bahanbakuid', 'id');
    }

    public function stokMasuk()
    {
        return $this->hasMany(ModelStokMasuk::class, 'bahanbakuid', 'id');
    }

    public function stokKeluar()
    {
        return $this->hasMany(ModelStokKeluar::class, 'bahanbakuid', 'id');
    }

    public function detailPembelian()
    {
        return $this->hasMany(ModelDetailPembelian::class, 'bahanbakuid', 'id');
    }
}