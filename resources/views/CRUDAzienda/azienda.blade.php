<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\azienda.css') }}">
@endsection

@section('content')
    @if(session()->has('azienda'))
        <div class="titolo_azienda">
            <h1>{{session('azienda')['nomeAzienda']}}</h1>
        </div>
        <br>
        <div class="immagine_azienda">
            <center>
                <img src={{URL(session('azienda')['logo']) }} height="400px"width="400px">
                <br>
            </center>
        </div>
        <div class="carattesristiche_azienda">
            <center>
                <i>
                    <li>{{session('azienda')['localizzazione']}}{{session('azienda')['tipologia']}}{{session('azienda')['ragioneSociale']}}</li>
                </i>
            </center>
        </div>
        <br>
        <section>
            <div class="descrizione_azienda">
                {{session('azienda')['descrizioneAzienda']}}
            </div>
        </section>



    @endif
@endsection
</html>
