<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * La validazione è inclusa, è come se fosse $request->validate([])
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:8',
            'password' => 'required|string|confirmed|min:8',
            'email'=> 'required|string|email',
            'nome' => 'required',
            'cognome'=>'required',
            'telefono'=>'required|min:10|max:10',
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
            'confirmed' => 'Le password inserite non coincidono'
        ];
    }
}
