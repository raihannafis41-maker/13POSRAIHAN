<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelShift extends Model
{
    protected $table = 'shift';

    protected $fillable = [
        'userid',
        'shiftmulai',
        'shiftselesai',
        'saldoawal',
        'saldoakhir',
        'totaltransaksi',
        'status'
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
}