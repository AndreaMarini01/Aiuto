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


public function filter(Request $request){
    $output="";
    $filteredCoupons= Coupon::where('idAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
    foreach ($filteredCoupons as $filteredCoupon){
        $output.=
            '<div class="promozione">
             <p>Nome Offerta: '.$filteredCoupon->idAzienda.'</p>
             <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
            </div>';
    }
return response($output);

}



    public function filter2(Request $request){

        $output="";
        $filteredCoupons= Coupon::where('oggetto','Like','%'.$request->ricercaParola.'%')->get();
        foreach ($filteredCoupons as $filteredCoupon){
            $output.=
                '<div class="promozione">
             <p>Nome Offerta: '.$filteredCoupon->idAzienda.'</p>
             <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
            </div>';
        }
        return response($output);

    }


    public function filter3(Request $request){

        $output="";
        $filteredCouponsbyName= Coupon::where('idAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
        $filteredCouponsbyWords= Coupon::where('oggetto','Like','%'.$request->ricercaParola.'%')->get();
        $filteredCoupons=$filteredCouponsbyName+$filteredCouponsbyWords;
        foreach ($filteredCoupons as $filteredCoupon){
            $output.=
                '<div class="promozione">
                    <p>Nome Offerta: '.$filteredCoupon->idAzienda.'</p>
                    <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
                 </div>';
        }
        return response($output);

    }


}
