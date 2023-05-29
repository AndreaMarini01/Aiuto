<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function modificaProfilo()
    {
        return view('Profilo/modificaProfilo');
    }

    public function profilo(){
        return view('Profilo/profilo');
    }
    public function modificaProfiloPost(Request $request)
    {

        $request->validate([
            'username',
            'password',
            'email',
            'nome',
            'cognome',
            'telefono',
            'datadinascita',
            'genere'
        ]);

        $data['username'] = $request->username;
        $data['password']=Hash::make($request->password);
        $data['email'] = $request->email;
        $data['nome'] = $request->nome;
        $data['cognome'] = $request->cognome;
        $data['telefono'] = $request->telefono;
        $data['datadinascita'] = $request->datadinascita;
        $data['genere'] = $request->genere;
        $data['role']=Auth::user()->role;


        $currentUser=Auth::user();
        Auth::user()->username=$data['username'];
        Auth::user()->password=$data['password'];
        Auth::user()->email=$data['email'];
        Auth::user()->nome=$data['nome'];
        Auth::user()->cognome=$data['cognome'];
        Auth::user()->telefono=$data['telefono'];
        Auth::user()->datadinascita=$data['datadinascita'];
        Auth::user()->genere=$data['genere'];

        Auth::user()->save();

        return redirect(route('profile'));

    }
}
