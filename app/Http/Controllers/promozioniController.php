<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\emissione_coupon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class promozioniController extends Controller
{

    public function listaPromozioni(){
        $promozioni=DB::Table('coupons')->get();
        $listaPromozioni=[];
        foreach ($promozioni as $promozione) {
            $dataScadenza = new DateTime($promozione->dataScadenza);
            $dataOdierna = new DateTime(date("Y-m-d"));

            if ($dataOdierna <= $dataScadenza) {
                array_push($listaPromozioni, $promozione);
            }
        }
            if(Auth::user()->role=='user') {
                $couponSalvati=DB::Table('emissione_coupon')->where('idUtente', Auth::user()->id)->get();
                foreach ($couponSalvati as $coupon) {
                    for ($i = 0; $i <= sizeof($listaPromozioni) - 1; $i++) {
                        if ($coupon->idCoupon == $listaPromozioni[$i]->idCoupon) {
                            array_splice($listaPromozioni, $i, 1);
                        }
                    }
                }
                return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni'=>$listaPromozioni]);
            }else{
                return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni'=>$listaPromozioni]);
            }
        }





    public function modificaPromozione(Request $request){
        $promozione=DB::Table('coupons')
            ->where('idCoupon', $request->idCoupon)->get();
        $option= 'edit';
        return view('CRUDPromozioni/promozioneDesigner', ['promozione'=>$promozione], ['option'=>$option]);
    }


    public function promozioneCreator(){
        return view('CRUDPromozioni/promozioneDesigner', ['option'=>'create']);
    }

    public function visualPromozione(Request $request){
        $info=DB::Table('coupons')
            ->where('idCoupon', $request->idCoupon)->get();
        return view('CRUDPromozioni/promozione',['info'=> $info]);
    }

    public function eliminaPromozione(Request $request){
        DB::delete('delete from coupons where idCoupon = ?',[$request->idCoupon]);
        return redirect(route('listaPromozioni'));
    }

    public function editPromozione(Request $request)
    {

        $data['nomeCoupon'] = $request->nomeCoupon;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['idAzienda'] = $request->Azienda;
        $data['qrCode'] = 'prova';
        $data['dataScadenza'] = $request->dataScadenza;;

        Coupon::where('idCoupon',$request->id)->update($data);
        return redirect(route('listaPromozioni'));
    }

    public function creaPromozione(Request $request)
    {

        $request->validate([
            'idCoupon',
            'oggetto',
            'modalità',
            'scontistica',
            'luogoFruizione',
            'Azienda',
        ]);

        $data['nomeCoupon'] = $request->nomeCoupon;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['idAzienda'] = $request->Azienda;
        $data['qrCode'] = 'prova';
        $data['dataScadenza'] = $request->dataScadenza;;
        $Coupon = Coupon::create($data);

        return redirect(route('listaPromozioni'));

    }

    public function salvaCoupon(Request $request){
        $data['idCoupon']=$request->idCoupon;
        $data['idUtente']=Auth::user()->id;
        $data['dataEmissione']=date('Y-m-d');
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        $data['codice']=$randomString;
        emissione_coupon::create($data);
        return redirect(route('listaPromozioni'));
    }

    public function couponSalvati()
    {
        $listaId=DB::Table('emissione_coupon')
            ->where('idUtente', Auth::user()->id)->get();
        $tuttiCoupon=DB::Table('coupons')->get();
        $listaCoupon=[];
        $dataOdierna= new DateTime(date("Y-m-d"));
        $listaCodici=[];
        foreach ($listaId as $id){
            foreach ($tuttiCoupon as $coupon){
                $dataScadenza=new DateTime($coupon->dataScadenza);
                if($coupon->idCoupon==$id->idCoupon and $dataOdierna<=$dataScadenza){
                    array_push($listaCodici,$id->codice);
                    array_push($listaCoupon,$coupon);
                }
            }
        }
        return view('couponSalvati',['listaCoupon'=>$listaCoupon],['listaCodici'=>$listaCodici]);
    }

}
