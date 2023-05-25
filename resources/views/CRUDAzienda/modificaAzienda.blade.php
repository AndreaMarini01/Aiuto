<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\modificaAzienda.css') }}">
@endsection

@section('content')

    @if(session()->has('azienda'))

        <center><form method="POST" class="form">
                @csrf
                <h2>Modifica i dati dell'azienda</h2>
                <div class="idAzienda"> <input name="id" value="{{session('azienda')['id']}}"></div>
                <label for="nomeAzienda">Nome Azienda:</label>
                <input type="text" name="nomeAzienda" id="nomeAzienda" value="{{session('azienda')['nomeAzienda']}}">
                <label for="ragioneSociale">Ragione Sociale:</label>
                <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{session('azienda')['ragioneSociale']}}"><br><br>
                <label for="localizzazione">Localizzazione:</label>
                <input type="text" id="localizzazione" name="localizzazione" value="{{session('azienda')['localizzazione']}}"><br><br>
                <label for="tipologia">Tipologia Azienda:</label>
                <input type="text" id="tipologia" name="tipologia" value="{{session('azienda')['tipologia']}}"><br><br>
                <label for="logo">Logo:</label>
                <input type="text" id="logo" name="logo" value="{{session('azienda')['logo']}}"><br><br>
                <label for="descrizioneAzienda">Descrizione Azienda:</label>
                <textarea id="descrizioneAzienda" name="descrizioneAzienda">{{session('azienda')['descrizioneAzienda']}}</textarea><br><br>
                <input type="submit" value="Salva Modifiche" formaction="{{route('modificaAziendaFinale')}}">
                <input type="submit" value="ELIMINA" formaction="{{route('eliminaAzienda')}}">
            </form></center>
    @endif

@endsection
</html>
