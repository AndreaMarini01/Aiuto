<?php



namespace App\Http\Controllers;

use App\Http\Requests\aziendaRequest;
use App\Models\Azienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;


class aziendaController extends Controller
{
    public function listaAziende(){
        $aziende=DB::select('select * from aziendas');
        return view('CRUDAzienda/listaAziende', ['listaAziende'=>$aziende]);
    }


    public function modificaAzienda(Request $request){
        $azienda=DB::Table('aziendas')
            ->where('idAzienda', $request->idAzienda)->get();
        $option= 'edit';
        return view('CRUDAzienda/aziendaDesigner', ['azienda'=>$azienda], ['option'=>$option]);
    }


    public function aziendaCreator(){
        return view('CRUDAzienda/aziendaDesigner', ['option'=>'create']);
    }

    public function visualAzienda(Request $request){
        $info=DB::Table('aziendas')
            ->where('idAzienda', $request->idAzienda)->get();
        return view('CRUDAzienda/azienda',['info'=> $info]);
    }

    public function eliminaAzienda(Request $request){
        DB::delete('delete from aziendas where idAzienda = ?',[$request->idAzienda]);
        return redirect(route('listaAziende'));
    }

    public function editAzienda(aziendaRequest $request)
    {

        $data['idAzienda'] = $request->idAzienda;
        $data['ragioneSociale'] = $request->ragioneSociale;
        $data['nomeAzienda'] = $request->nomeAzienda;
        $data['localizzazione'] = $request->localizzazione;
        if ($request->logo){
            $logoName = time().'.'.$request->logo->extension();
            $data['logo'] = $logoName;
            $request->logo->move(public_path('images'), $logoName);
        }
        $data['tipologia'] = $request->tipologia;
        $data['descrizioneAzienda'] = $request->descrizioneAzienda;

        Azienda::where('idAzienda',$data['idAzienda'])->update($data);


        return redirect(route('listaAziende'));
    }

    public function creaAzienda(aziendaRequest $request)
    {
        $logoName = time().'.'.$request->logo->extension();
        $data['ragioneSociale'] = $request->ragioneSociale;
        $data['localizzazione'] = $request->localizzazione;
        $data['nomeAzienda'] = $request->nomeAzienda;
        $data['logo'] = $logoName;
        $data['tipologia'] = $request->tipologia;
        $data['descrizioneAzienda'] = $request->descrizioneAzienda;
        Azienda::create($data);

        $request->logo->move(public_path('images'), $logoName);

        return redirect(route('listaAziende'));

    }




}
