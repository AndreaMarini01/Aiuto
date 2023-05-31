<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emissione_coupon extends Model
{
    protected $table = 'emissione_coupon';

    protected $fillable = [
        'idCoupon',
        'idUtente',
        'dataEmissione',
        'codice'
    ];

    public $timestamps = false;
}
