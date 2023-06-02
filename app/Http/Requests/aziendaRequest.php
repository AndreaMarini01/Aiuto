<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;

class aziendaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return[
            'nomeAzienda'=>'required|string',
            'localizzazione'=>'required',
            'tipologia'=>'required',
            'descrizioneAzienda'=>'required',
            'ragioneSociale'=>'required',
        ];
    }

    public function messages (){
        return[
          'required' => 'il campo :attribute è necessario'
        ];
    }
}
