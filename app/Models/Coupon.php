<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable =[
        'idCoupon', 'idAzienda',
        'oggetto', 'modalità',
        'scontistica', 'qrCode',
        'luogoFruizione', 'tempoFruizione'
    ];

    public function appartenenzaAzienda(){
        return $this->belongsTo('app\Models\Azienda', 'idAzienda');
    }

    public $timestamps = false;

}
