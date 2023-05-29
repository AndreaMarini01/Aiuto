<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class promozioniController extends Controller
{

    public function listaPromozioni(){
        $promozioni=DB::select('select * from Coupons');
        return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni'=>$promozioni]);
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

        $data['idCoupon'] = $request->idCoupon;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['idAzienda'] = $request->Azienda;
        $data['qrCode'] = 'prova';
        $data['tempoFruizione'] = '2h';

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

        $data['idCoupon'] = $request->idCoupon;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['idAzienda'] = $request->Azienda;
        $data['qrCode'] = 'prova';
        $data['tempoFruizione'] = '2h';
        $Coupon = Coupon::create($data);

        return redirect(route('listaPromozioni'));

    }

}
