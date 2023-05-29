<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class statsController extends Controller
{
    public function stats(){
        return (view('statistiche'));
    }
}
