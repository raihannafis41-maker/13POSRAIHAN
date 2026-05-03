<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStokMasuk extends Model
{
    use HasFactory;

    protected $table = 'stokmasuk';

    protected $fillable = [
        'bahanbakuid',
        'jumlah',
        'tanggalmasuk',
        'keterangan'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function bahanbaku()
    {
        return $this->belongsTo(ModelBahanBaku::class, 'bahanbakuid', 'id');
    }
}