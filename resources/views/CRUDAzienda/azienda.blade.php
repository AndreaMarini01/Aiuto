<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\infoAzienda.css') }}">
@endsection

@section('content')
    @if(!empty($info))
        @foreach($info as $azienda)
            <div class="titolo_azienda">
                <br><br>
                <h1>{{$azienda->nomeAzienda}}</h1>
            </div>
            <br>
            <div class="immagine_azienda">
                <center>
                    <!--Da capire come inserire bene l'immagine-->
                    <img src={{URL('images/'.$azienda->logo)}} height="300"width="300">
                    <br>
                </center>
            </div>
            <div class="caratteristiche_azienda">
                <center>
                    <br>
                        <li>{{$azienda->localizzazione}}, {{$azienda->tipologia}}, {{$azienda->ragioneSociale}}</li>
                </center>
            </div>
            <br>
            <section>
                <center>
                    <div class="descrizione_azienda">
                        {{$azienda->descrizioneAzienda}}
                    </div>
                </center>
            </section>
        @endforeach
    @endif
    <center><div class="bottone_indietro"><button  onclick="location.href='{{route('listaAziende')}}';">Indietro</button> </div></center>

@endsection
</html>
