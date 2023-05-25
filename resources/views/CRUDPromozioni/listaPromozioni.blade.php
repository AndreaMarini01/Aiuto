<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\listaPromozioni.css') }}">
@endsection

@section('content')

    <?php $info = \App\Models\Coupon::all(); ?>

    @for($i=0;$i<=sizeof($info)-1;$i++)
        <form action="{{route('promozioni')}}" method="POST" class="form">
            @csrf
            <div class="promozione">
                <div><p id="idCoupon"> Nome offerta: {{$info[$i]['idCoupon']}} </p></div>
                <div><p id="oggetto"> Oggetto offerta: {{$info[$i]['oggetto']}} </p></div>
                <div class="nomeCoupon"> <input name="idCoupon" value="{{$info[$i]['idCoupon']}}"></div>
                <div>
                    <div class="bottoni1"> <input type="submit" value="MODIFICA" formaction="{{route('modificaPromozionePost')}}"> </div>
                    <div class="bottoni2"> <input type="submit" value="VISUALIZZA" formaction="{{route('visualizzaPromozionePost')}}"> </div>
                </div>
            </div>
        </form>
    @endfor
    <form action="{{route('creaPromozione')}}" method="POST" class="form">
        @csrf
        <div class="aggiungiOfferta"><button type="submit">+</button></div>
    </form>

@endsection
</html>
