<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\promozione.css') }}">
@endsection

@section('content')

    @if(!empty($info))
        @foreach($info as $promozione)
            <div class="infoOfferta">
                <div class="offerta"><p>Nome Offerta: {{$promozione->nomePromozione}}</p></div>
                <div><p>Azienda: {{$promozione->nomeAzienda}}</p></div>
                <div><p>Descrizione offerta: {{$promozione->oggetto}}</p></div>
                <div><p>Modalità offerta: {{$promozione->modalità}}</p></div>
                <div><p>Sconto: {{$promozione->scontistica}}</p></div>
                <div><p>Usufruibile presso: {{$promozione->luogoFruizione}}</p></div>
                <div><p>Nel periodo: {{$promozione->dataScadenza}}</p></div>
            </div>
        @endforeach
    @endif

@endsection
</html>
