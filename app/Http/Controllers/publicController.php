<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class publicController extends Controller{


    public function home(){
        return view('home');
    }

    public function catalogo(){
        return view('catalogo');
    }

    public function info(){
        return view('info');
    }


    public function profile(){
        return view('profilo');
    }
}
