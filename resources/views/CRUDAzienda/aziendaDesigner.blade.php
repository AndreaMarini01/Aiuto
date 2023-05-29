<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\aziendaEditor.css') }}">
@endsection

@section('content')
    @if($option == 'edit')
        <h2>Modifica Azienda</h2>

    @endif
    @if($option == 'create')
        <h2>Crea nuova azienda</h2>
    @endif
    <center>
        @if(isset($azienda))
            @foreach($azienda as $a)
                <form method="POST" class="form">
                    @csrf
                    <h2>Modifica i dati dell'azienda</h2>

                    <label for="nomeAzienda">Nome Azienda:</label>
                    <input type="text" name="nomeAzienda" value="{{$a->nomeAzienda}}">
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{$a->ragioneSociale}}"><br><br>
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text"  name="localizzazione" value="{{$a->localizzazione}}"><br><br>
                    <label for="tipologia">Tipologia Azienda:</label>
                    <input type="text"  name="tipologia" value="{{$a->tipologia}}"><br><br>
                    <label for="logo">Logo:</label>
                    <input type="text"  name="logo" value="{{$a->logo}}"><br><br>
                    <label for="descrizioneAzienda">Descrizione Azienda:</label>
                    <textarea name="descrizioneAzienda">{{$a->descrizioneAzienda}}</textarea><br><br>

                    <input type="submit" value="Salva Modifiche" formaction="{{route('saveAzienda', ['id'=>$a->id])}}">
                    <input type="submit" value="ELIMINA" formaction="{{route('aziendaDelete',['id'=>$a->id])}}">
                    <br><br>
                </form>
            @endforeach

        @else
            <form method="POST" action="{{ route('createAzienda') }}">
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
                <textarea id="descrizioneAzienda" name="descrizioneAzienda"></textarea>
                <br><br>
                <input type="submit" value="Crea Azienda">
                <br><br>
            </form>
        @endif



    </center>
@endsection
