<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Promozione;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

class filterController extends Controller
{
    public function filter(Request $request){
        $output = "";
        if ($request->ricercaAzienda!=''&& $request->ricercaParola==''){
            $filteredCoupons= Promozione::where('nomeAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
            foreach ($filteredCoupons as $filteredCoupon){
                $output.=
                    '<div class="promozione">
             <p>Nome Offerta: '.$filteredCoupon->nomePromozione.'</p>
             <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
            </div>';
            }
            return response($output);
        }
        if ($request->ricercaParola!=''&&$request->ricercaAzienda==''){
            $filteredCoupons = Promozione::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCoupons as $filteredCoupon) {
                $output .=
                    '<div class="promozione">
             <p>Nome Offerta: ' . $filteredCoupon->nomePromozione . '</p>
             <p>Oggetto Offerta:' . $filteredCoupon->oggetto . '</p>
            </div>';
            }
            return response($output);
        }
        $listaCoupon=[];
        if ($request->ricercaParola && $request->ricercaAzienda) {
            $filteredCouponsbyName = Promozione::where('nomeAzienda', 'Like', '%' . $request->ricercaAzienda . '%')->get();
            $filteredCouponsbyWords = Promozione::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCouponsbyWords as $filteredCouponbyWords) {
                foreach ($filteredCouponsbyName as $filteredCouponbyName){
                    if ($filteredCouponbyName==$filteredCouponbyWords){
                        array_push($listaCoupon,$filteredCouponbyName);
                    }
                }
                foreach ($listaCoupon as $coupon){
                    $output .=
                        '<div class="promozione">
                    <p>Nome Offerta: ' . $coupon->nomePromozione . '</p>
                    <p>Oggetto Offerta:' . $coupon->oggetto . '</p>
                 </div>';
                }
            }
        }
        return response($output);
    }



}
