<?php



namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class aziendaController extends Controller
{
    public function listaAziende(){
        $aziende=DB::select('select * from aziendas');
        return view('CRUDAzienda/listaAziende', ['listaAziende'=>$aziende]);
    }


    public function modificaAzienda(Request $request){
        $azienda=DB::Table('aziendas')
            ->where('id', $request->id)->get();
        $option= 'edit';
        return view('CRUDAzienda/aziendaDesigner', ['azienda'=>$azienda], ['option'=>$option]);
    }


    public function aziendaCreator(){
        return view('CRUDAzienda/aziendaDesigner', ['option'=>'create']);
    }

    public function visualAzienda(Request $request){
        $info=DB::Table('aziendas')
            ->where('id', $request->id)->get();
        return view('CRUDAzienda/azienda',['info'=> $info]);
    }

    public function eliminaAzienda(Request $request){
        DB::delete('delete from aziendas where id = ?',[$request->id]);
        return redirect(route('listaAziende'));
    }

    public function editAzienda(Request $request)
    {
        $data['id'] = $request->id;
        $data['ragioneSociale'] = $request->ragioneSociale;
        $data['nomeAzienda'] = $request->nomeAzienda;
        $data['localizzazione'] = $request->localizzazione;
        $data['logo'] = $request->logo;
        $data['tipologia'] = $request->tipologia;
        $data['descrizioneAzienda'] = $request->descrizioneAzienda;

        Azienda::where('id',$data['id'])->update($data);
        return redirect(route('listaAziende'));
    }

    public function creaAzienda(Request $request)
    {
        $data['ragioneSociale'] = $request->ragioneSociale;
        $data['localizzazione'] = $request->localizzazione;
        $data['nomeAzienda'] = $request->nomeAzienda;
        $data['logo'] = $request->logo;
        $data['tipologia'] = $request->tipologia;
        $data['descrizioneAzienda'] = $request->descrizioneAzienda;
        Azienda::create($data);

        return redirect(route('listaAziende'));

    }

}
