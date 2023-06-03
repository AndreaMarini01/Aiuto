<?php

namespace App\Http\Controllers;

use App\Http\Requests\promozioneRequest;
use App\Models\Promozione;
use App\Models\emissione_coupon;
use DateTime;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class promozioniController extends Controller
{

    public function listaPromozioni()
    {
        $promozioni = DB::Table('promozione')->get();
        $listaPromozioni = [];
        foreach ($promozioni as $promozione) {
            $dataScadenza = new DateTime($promozione->dataScadenza);
            $dataOdierna = new DateTime(date("Y-m-d"));

            if ($dataOdierna <= $dataScadenza) {
                array_push($listaPromozioni, $promozione);
            }
        }
        /*
            if(!Auth::check() or Auth::user()->role=='user') {
                $couponSalvati=DB::Table('emissione_coupon')->where('idUtente', Auth::user()->id)->get();
                foreach ($couponSalvati as $coupon) {
                    for ($i = 0; $i <= sizeof($listaPromozioni) - 1; $i++) {
                        if ($coupon->idPromozione == $listaPromozioni[$i]->idPromozione) {
                            array_splice($listaPromozioni, $i, 1);
                        }
                    }
                }
                return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni'=>$listaPromozioni]);
            }
            else
            {
                return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni'=>$listaPromozioni]);
            }
        }*/
        if (!Auth::check()) {
            return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni' => $listaPromozioni]);
        } else if (Gate::allows('isUser')) {
            $couponSalvati = DB::Table('emissione_coupon')->where('idUtente', Auth::user()->id)->get();
            foreach ($couponSalvati as $coupon) {
                for ($i = 0; $i <= sizeof($listaPromozioni) - 1; $i++) {
                    if ($coupon->idPromozione == $listaPromozioni[$i]->idPromozione) {
                        array_splice($listaPromozioni, $i, 1);
                    }

                }
            }
            return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni'=>$listaPromozioni]);
        } else
            return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni' => $listaPromozioni]);
    }





    public function modificaPromozione(Request $request){
        $promozione=DB::Table('promozione')
            ->where('idPromozione', $request->idPromozione)->get();
        $option= 'edit';
        return view('CRUDPromozioni/promozioneDesigner', ['promozione'=>$promozione], ['option'=>$option]);
    }


    public function promozioneCreator(){
        return view('CRUDPromozioni/promozioneDesigner', ['option'=>'create']);
    }

    public function visualPromozione(Request $request){
        $info=DB::Table('promozione')
            ->where('idPromozione', $request->idPromozione)->get();
        return view('CRUDPromozioni/promozione',['info'=> $info]);
    }

    public function eliminaPromozione(Request $request){
        DB::delete('delete from promozione where idPromozione = ?',[$request->idPromozione]);
        return redirect(route('listaPromozioni'));
    }

    public function editPromozione(promozioneRequest $request)
    {

        $data['nomePromozione'] = $request->nomePromozione;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['nomeAzienda'] = $request->Azienda;
        $data['dataScadenza'] = $request->dataScadenza;;

        Promozione::where('idPromozione',$request->id)->update($data);
        return redirect(route('listaPromozioni'));
    }

    public function creaPromozione(promozioneRequest $request)
    {

        $data['nomePromozione'] = $request->nomePromozione;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['nomeAzienda'] = $request->Azienda;
        $data['dataScadenza'] = $request->dataScadenza;;
        Promozione::create($data);

        return redirect(route('listaPromozioni'));

    }

    public function salvaCoupon(Request $request){
        $data['idPromozione']=$request->idPromozione;
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
        $listaId=DB::Table('emissione_coupon')
            ->where('idUtente', Auth::user()->id)->get();
        $Coupons=DB::Table('promozione')->where('idPromozione', $request->idPromozione)->get();
        $codice=null;
        foreach ($listaId as $coupon){
            if ($coupon->idPromozione==$request->idPromozione){
                $codice=$coupon->codice;
            }
        }
        return view('couponSalvati',['promozione'=>$Coupons],['codice'=>$codice]);
    }

    public function couponSalvati()
    {
        $listaId=DB::Table('emissione_coupon')
            ->where('idUtente', Auth::user()->id)->get();
        $tuttiCoupon=DB::Table('promozione')->get();
        $listaCoupon=[];
        $dataOdierna= new DateTime(date("Y-m-d"));
        $listaCodici=[];
        foreach ($listaId as $id){
            foreach ($tuttiCoupon as $coupon){
                $dataScadenza=new DateTime($coupon->dataScadenza);
                if($coupon->idPromozione==$id->idPromozione and $dataOdierna<=$dataScadenza){
                    array_push($listaCodici,$id->codice);
                    array_push($listaCoupon,$coupon);
                }
            }
        }
        return view('couponSalvati',['listaCoupon'=>$listaCoupon],['listaCodici'=>$listaCodici]);
    }


    public function couponSingolo(Request $request){
        $listaId=DB::Table('emissione_coupon')
            ->where('idUtente', Auth::user()->id)->get();
        $Coupons=DB::Table('promozione')->where('idPromozione', $request->idPromozione)->get();
        $codice=null;
        foreach ($listaId as $coupon){
            if ($coupon->idPromozione==$request->idPromozione){
                $codice=$coupon->codice;
            }
        }
        return view('couponSalvati',['promozione'=>$Coupons],['codice'=>$codice]);
    }
}
