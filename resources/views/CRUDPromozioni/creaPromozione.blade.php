<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\creaPromozione.css') }}">
@endsection

@section('content')

    <center><form action="{{route('creaPromozionePost')}}" method="POST" class="form">
            @csrf

            <label for="idCoupon">Nome Offerta: </label>
            <input type="text" id="idCoupon" name="idCoupon"><br><br>
            <label for="oggetto">Oggetto:</label>
            <input type="text" id="oggetto" name="oggetto"><br><br>
            <label for="modalità">modalità:</label>
            <input type="text" id="modalità" name="modalità"><br><br>
            <label for="scontistica">Scontistica:</label>
            <input type="text" id="scontistica" name="scontistica"><br><br>
            <label for="luogoFruizione">Luogo fruizione:</label>
            <input type="text" id="luogoFruizione" name="luogoFruizione"><br><br>
            <label for="Azienda">Azienda: </label>
            <select id="Azienda" name="Azienda">
                <option value="Azienda 1">Azienda 1</option>
                <option value="Azienda 2">Azienda 2</option>
                <option value="Azienda 3">Azienda 3</option>
            </select><br><br>
            <input type="submit" value="CREA">
        </form></center>

@endsection
</html>
