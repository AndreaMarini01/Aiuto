<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class loginController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    function errors(){
        return "Username o Password Errati";
    }
    function loginPost(LoginRequest $request)
    {

        $request->authenticate();



        $validator = Validator::make($request->all(),[
            'username' ,
            'password' ,
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $request->session()->regenerate();



        /**
         * Redirezione su diverse Home Page in base alla classe d'utenza.
         */
//
        //Prendo il ruolo dell'utente autenticato e lo indirizzo in una determinata pagina a seconda della classe di utenza
        $role = auth()->user()->role;
        switch ($role) {
            case 'admin': return redirect()->route('home');
                break;
            case 'user': return redirect()->route('home');
                break;
            case 'staff':return redirect()->route('home');

           // default: return redirect('catalogo');
        }


    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //function signupPost(Request $request)
    function signupPost(SignUpRequest $request)
    {


        $data['nome'] = $request->nome;
        $data['email']=$request->email;
        $data['password'] = Hash::make($request->password);
        $data['username'] = $request->username;
        $data['cognome'] = $request->cognome;
        $data['telefono'] = $request->telefono;
        $data['datadinascita'] = $request->datadinascita;
        $data['genere'] = $request->genere;
        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        if (!$user) {
            return redirect(route('signup'))->with("Errore", "Register details are not valid");
        }
        return redirect(route('home'));

    }

    function logout(Request $request):RedirectResponse

    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect(route('home'));
    }

}
