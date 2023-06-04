<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class profiloRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   /* public function rules()
    {
        return [
            'username' => 'required','string','min:8',Rule::unique('users')
                        ->ignore($this->user()->username, 'username'),
            'password' => 'required|string|min:8',
            'email'=> 'required','string','email', Rule::unique('users')
                ->ignore($this->user()->email,'email'),
            'nome' => 'required',
            'cognome'=>'required',
            'telefono'=>'required|min:10|max:10',
            'datadinascita'=> 'required'
        ];
    }*/

    public function rules()
    {
        $user_id = $this->request->get('user_id');
        return [
            'username' => ['required', 'string', 'min:8',
                Rule::unique('users', 'username')->ignore($user_id)],
            'password' => 'required|string|min:8',
            'email'=> ['required', 'string', 'email',
                Rule::unique('users', 'email')->ignore($user_id)],
            'nome' => 'required',
            'cognome'=>'required',
            'telefono'=>'required|min:8|max:10',
            'datadinascita'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'il campo :attribute è necessario',
            'username.min' => 'Il campo :attribute deve avere esattemente 8 caratteri',
            'password.min' => 'Il campo :attribute deve avere almeno 8 caratteri',
            'max'=> 'Il campo :attribute deve avere esattemente 10 caratteri',
            'telefono.min' => 'Numero di telefono non valido',
            'telefono.max' => 'Numero di telefono non valido',
            'email'=> 'E-mail non valida',
            'unique'=>'Il valore è già associtao ad un altro account'

        ];
    }
}
