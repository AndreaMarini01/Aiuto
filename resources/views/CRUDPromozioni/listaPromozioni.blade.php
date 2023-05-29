<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\listaPromozioni.css') }}">
@endsection

@section('content')

    <?php $info = \App\Models\Coupon::all(); ?>

    @foreach($listaPromozioni as $promozione)
        @csrf
        <div class="promozione">
            <div><p id="idCoupon"> Nome offerta: {{$promozione->idCoupon}} </p></div>
            <div><p id="oggetto"> Oggetto offerta: {{$promozione->oggetto}} </p></div>
            <div class="nomeCoupon"> <input name="idCoupon" value="{{$promozione->idCoupon}}"></div>
            <div>
                <div class="bottoni1"> <input type="submit" value="MODIFICA" onclick="location.href='{{route('modificaPromozione', ['idCoupon'=>$promozione->idCoupon])}}';"> </div>
                <div class="bottoni2"> <input type="submit" value="VISUALIZZA" onclick="location.href='{{route('visualPromozione', ['idCoupon'=>$promozione->idCoupon])}}';"> </div>
            </div>
        </div>
    @endforeach
    <div class="aggiungiOfferta"><button type="submit" onclick="location.href='{{route('promozioneCreator')}}';">+</button></div>
@endsection
</html>
