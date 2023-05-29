<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'Faq';

    protected $fillable = [
        'id',
        'domanda',
        'risposta'
    ];
    public $timestamps = false;

}
