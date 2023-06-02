<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\couponSalvati.css') }}">
@endsection

@section('content')


    @for($i=0;$i<=sizeof($listaCoupon)-1; $i++)
        <div class="header_coupon">
            <div class="nomeCoupon"><h1>{{$listaCoupon[$i]->nomeCoupon}}</h1></div>
            <div class="scadenza"> Scadenza: {{$listaCoupon[$i]->dataScadenza}}</div>
        </div>
        <br>
        <br>
        <body>
        <div class="descrizione_offerta">
            <p>{{$listaCoupon[$i]->oggetto}}</p>
        </div>
        </body>
        <div class="footer_coupon">
            <div class="scontistica">{{$listaCoupon[$i]->scontistica}}%</div>
            <div class="codice">Il tuo codice: {{$listaCodici[$i]}} </div>
        </div>
        <hr color="#4CAF50">
    @endfor


    <br><br>
    <center><div class="bottone_indietro"><button  onclick="location.href='{{route('profile')}}';">Indietro</button> </div></center>



@endsection
</html>
