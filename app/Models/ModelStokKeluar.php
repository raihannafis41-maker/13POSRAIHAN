<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStokKeluar extends Model
{
    use HasFactory;

    protected $table = 'stokkeluar';

    protected $fillable = [
        'bahanbakuid',
        'jumlah',
        'tanggalkeluar',
        'alasan'
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