<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;

class promozioneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return[
            'nomePromozione'=>'required',
            'oggetto'=>'required',
            'modalità'=>'required',
            'scontistica'=>'required|integer',
            'luogoFruizione'=>'required',
            'dataScadenza'=>'required',
        ];
    }

    public function messages (){
        return[
            'required'=>'il campo :attribute è necessario',
            'integer'=>'il valore inserito deve essere un numero'
        ];
    }
}
