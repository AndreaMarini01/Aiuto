<?php
namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class publicController extends Controller{


    public function home(){
        return view('home');
    }

    public function info(){
        return view('info');
    }

}
