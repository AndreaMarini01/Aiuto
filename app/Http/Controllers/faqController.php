<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as V;
use Illuminate\Http\Request as R;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class faqController extends Controller
{

    public function faq(){
        $faq=DB::select("select * from faq");
        return view('CRUDFaq/faq', ['faq'=>$faq]);
    }


    public function faqCreate(R $request){

        $domanda = $request->input('domanda');
        $risposta = $request->input('risposta');


        DB::insert('insert into faq (domanda, risposta) values (?, ?)', [$domanda, $risposta]);
        return redirect()->route('faq');

    }

    public function faqedit(R $request){
        if($request->id=='create'){
            return view('CRUDFaq/faqDesigner', ['option'=>'create']);

        }
        else{
            $option = 'edit';
            $query="select * from faq where id='".$request->id."'";
            $faq=DB::select($query);


            #return view('faq');
            return view('CRUDFaq/faqDesigner', ['option'=>$option], ['faq'=>$faq]);
        }

    }


    public function savefaq(R $request){


        $domanda = $request->input('domanda');
        $risposta = $request->input('risposta');

        DB::Table('faq')
            ->where('id', $request->id)
            ->update(['domanda'=>$domanda, 'risposta'=>$risposta]);

        return redirect()->route('faq');


    }

    public function faqdelete(R $request) {
        DB::delete('delete from faq where id = ?',[$request->id]);
        return redirect()->route('faq');
    }


}
