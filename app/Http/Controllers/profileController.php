<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Requests\profiloRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function modificaProfiloPost(profiloRequest $request)
    {
        $data['username'] = $request->username;
        $data['password']=Hash::make($request->password);
        $data['email'] = $request->email;
        $data['nome'] = $request->nome;
        $data['cognome'] = $request->cognome;
        $data['telefono'] = $request->telefono;
        $data['datadinascita'] = $request->datadinascita;
        $data['genere'] = $request->genere;
        //$data['role']=Auth::user()->role;

        $listaUser=User::all();
        $listaUsername=[];
        foreach ($listaUser as $user){
            if (Auth::user()->username!=$user->username){
                array_push($listaUsername,$user->username);
            }
        }
        if (in_array($request->username, $listaUsername)) {
            return view('Profilo/modificaProfilo', ['erroreUsername' => 'Lo username scelto è già in uso']);
        }

        Auth::user();
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
