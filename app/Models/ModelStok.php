<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStok extends Model
{
    use HasFactory;

    protected $table = 'stok';

    protected $fillable = [
        'bahanbakuid',
        'stoktersedia',
        'stokminimal',
        'status'
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