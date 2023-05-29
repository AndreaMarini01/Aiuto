<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('public\css\home.css') }}">
@endsection
@section('content')

    <h1>Home</h1>
    <div class="zone">
        <h2>Descrizione sito</h2>
        <p>Benvenuto su CouponBeast! Qua troverai i migliori coupon di ogni azienda</p>
    </div>
    <br>
    <div class="zone">
        <h2>Funzionalità del Sito</h2>
        <p>Tra le funzionalità del sito potrai:</p>
        <ul>
            <li>Creare un account</li>
            <li>Accedere ad un sacco di promozioni diverse!</li>
            <li>Acquisire coupon e stamparli</li>
        </ul>

    </div>




@endsection

</html>

