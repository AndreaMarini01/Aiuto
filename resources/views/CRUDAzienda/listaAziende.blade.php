<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\infoAzienda.css') }}">
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\listaAziende.css') }}">
@endsection
@section('content')
    <ul>
        <!-- ogni elemento in lista-aziende sarà serializzato
            La funzione di interesse prenderà i dati da db, poi con un foreach produrrà tutti i risultati utili
         -->

        <div class="lista-aziende">
            @if(!empty($listaAziende))
                @foreach($listaAziende as $azienda)
                    <li>
                        <img src={{URL('images/'.$azienda->logo)}} height="200"width="200">
                        <h3>{{$azienda->nomeAzienda}}</h3>
                        <div class="testolista"> {{$azienda->descrizioneAzienda}}</div>
                        @if(isset(Auth::User()->nome))
                            @can('isAdmin')
                                <button onclick="location.href='{{route('modificaAzienda', ['idAzienda'=>$azienda->idAzienda])}}';">Modifica Azienda</button>
                            @endcan
                        @endif
                        <button onclick="location.href='{{route('azienda', ['idAzienda'=>$azienda->idAzienda])}}';">Visual Azienda</button>
                    </li>
                @endforeach
            @endif
        </div>
    </ul>
    @if(isset(Auth::User()->nome))
        @can('isAdmin')
            <div class="aggiungiAzienda">
                <button  onclick="location.href='{{route('aziendaCreator', ['option'=>'create'])}}';">+</button>
                <br><br>
            </div>
        @endcan
    @endif
@endsection
</html>
