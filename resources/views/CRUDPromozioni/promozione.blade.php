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
                <div class="offerta"><p>Nome Offerta: {{$promozione->idCoupon}}</p></div>
                <div><p>Azienda: {{$promozione->idAzienda}}</p></div>
                <div><p>Descrizione offerta: {{$promozione->oggetto}}</p></div>
                <div><p>Modalità offerta: {{$promozione->modalità}}</p></div>
                <div><p>Sconto: {{$promozione->scontistica}}</p></div>
                <div><p>QrCode: {{$promozione->qrCode}}</p></div>
                <div><p>Usufruibile presso: {{$promozione->luogoFruizione}}</p></div>
                <div><p>Nel periodo: {{$promozione->tempoFruizione}}</p></div>
            </div>
        @endforeach
    @endif

@endsection
</html>
