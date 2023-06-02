<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promozione extends Model
{
    protected $table = 'promozione';
    protected $primaryKey = 'idCoupon';

    protected $fillable =[
        'oggetto', 'modalità',
        'scontistica',
        'luogoFruizione', 'dataScadenza',
        'nomePromozione', 'nomeAzienda'
    ];

    public $timestamps = false;

}
