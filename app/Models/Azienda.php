<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'aziendas';

    protected $fillable = [
        'ragioneSociale', 'localizzazione',
        'nomeAzienda', 'logo',
        'tipologia', 'descrizioneAzienda'
    ];

    public $timestamps = false;
}
