<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class statsController extends Controller
{

    public function stats(){
        $utenti=DB::Table('users')
            ->where('role', 'user')->get();
        $promozioni=DB::Table('promozione')->get();
        $listaCoupon=DB::Table('emissione_coupon')->get();
        $lista=['listaPromozioni'=>$promozioni,
            'listaUtenti'=>$utenti,
            'listaCoupon'=>$listaCoupon];
        return view('statistiche')->with(['lista'=>$lista]);
    }
}
