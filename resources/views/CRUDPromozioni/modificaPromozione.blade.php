<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\modificaPromozione.css') }}">
@endsection

@section('content')

    @if(session()->has('promozione'))

        <center><form method="POST" class="form">
                @csrf
                <h2>Modifica i dati della promozione {{session('promozione')['idCoupon']}}</h2>
                <div class="nomeCoupon"> <input name="idCoupon" value="{{session('promozione')['idCoupon']}}"></div>
                <label for="oggetto">Oggetto:</label>
                <input type="text" id="oggetto" name="oggetto" value="{{session('promozione')['oggetto']}}"><br><br>
                <label for="modalità">Modalità:</label>
                <input type="text" id="modalità" name="modalità" value="{{session('promozione')['modalità']}}"><br><br>
                <label for="scontistica">Scontistica:</label>
                <input type="text" id="scontistica" name="scontistica" value="{{session('promozione')['scontistica']}}"><br><br>
                <label for="luogoFruizione">Luogo fruizione:</label>
                <input type="text" id="luogoFruizione" name="luogoFruizione" value="{{session('promozione')['luogoFruizione']}}"><br><br>
                <select id="Azienda" name="Azienda">
                    <option value="Azienda1">Azienda1</option>
                    <option value="Azienda2">Azienda2</option>
                    <option value="Azienda3">Azienda3</option>
                </select><br><br>
                <input type="submit" value="Salva Modifiche" formaction="{{route('modificaPromozioneFinale')}}">
                <input type="submit" value="ELIMINA" formaction="{{route('eliminaPromozione')}}">
            </form></center>
    @endif

@endsection
</html>
