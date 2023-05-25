<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\creaAzienda.css') }}">
@endsection

@section('content')

    <center><form action="{{route('creaAziendaPost')}}" method="POST" class="form">
            @csrf
            <label for="nomeAzienda">Nome Azienda: </label>
            <input type="text" id="nomeAzienda" name="nomeAzienda"><br><br>
            <label for="ragioneSociale">Ragione Sociale:</label>
            <input type="text" id="ragioneSociale" name="ragioneSociale"><br><br>
            <label for="localizzazione">localizzazione:</label>
            <input type="text" id="localizzazione" name="localizzazione"><br><br>
            <label for="logo">Logo:</label>
            <input type="text" id="logo" name="logo"><br><br>
            <label for="tipologia">Tipologia di azienda:</label>
            <input type="text" id="tipologia" name="tipologia"><br><br>
            <label for="descrizioneAzienda">Descrizione dell'azienda:</label>
            <input type="text" id="descrizioneAzienda" name="descrizioneAzienda"><br><br>
            <input type="submit" value="CREA">
        </form></center>

@endsection
</html>
