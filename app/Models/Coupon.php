<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable =[
        'idAzienda',
        'oggetto', 'modalità',
        'scontistica', 'qrCode',
        'luogoFruizione', 'dataScadenza', 'nomeCoupon'
    ];

    public $timestamps = false;

}
