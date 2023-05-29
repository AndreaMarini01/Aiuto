<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

class filterController extends Controller
{

    public function ajaxResponse(Request $request)
    {
        $aziende=DB::Table('aziendas')
            ->where('nomeAzienda', $request->ricercaAzienda)->get();
        return response()->json($aziende);
    }

}
