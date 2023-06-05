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
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Modifica i dati dell'azienda</h2>
                    <br><br>
                    <label for="nomeAzienda">Nome Azienda: </label>
                    <input type="text" id="nomeAzienda" name="nomeAzienda" value="{{$a->nomeAzienda}}">
                    @if ($errors->first('nomeAzienda'))
                        <ul class="errore">
                            @foreach ($errors->get('nomeAzienda') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <br><br>
                    <label for="logo">Logo:</label>
                    <input type="file" id="logo" name="logo"><br><br>
                    @if ($errors->first('logo'))
                        <ul class="erroreLogo">
                            @foreach ($errors->get('logo') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                        <br>
                    @endif
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{$a->ragioneSociale}}">
                    @if ($errors->first('ragioneSociale'))
                        <ul class="errore">
                            @foreach ($errors->get('ragioneSociale') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <br><br>
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text"  name="localizzazione" value="{{$a->localizzazione}}">
                    @if ($errors->first('localizzazione'))
                        <ul class="errore">
                            @foreach ($errors->get('localizzazione') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <br><br>
                    <label for="tipologia">Tipologia Azienda:</label>
                    <input type="text"  name="tipologia" value="{{$a->tipologia}}">
                    @if ($errors->first('tipologia'))
                        <ul class="errore">
                            @foreach ($errors->get('tipologia') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <br><br>
                    <label for="descrizioneAzienda">Descrizione Azienda:</label>
                    <textarea name="descrizioneAzienda">{{$a->descrizioneAzienda}}</textarea>
                    @if ($errors->first('descrizioneAzienda'))
                        <ul class="erroreDescrizione">
                            @foreach ($errors->get('descrizioneAzienda') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <br><br>
                    <input type="hidden" id="azienda_id" name="azienda_id" value="{{$a->idAzienda}}">
                    <input type="submit" value="Salva Modifiche" formaction="{{route('saveAzienda', ['idAzienda'=>$a->idAzienda])}}">
                    <input type="submit" value="ELIMINA" formaction="{{route('aziendaDelete',['idAzienda'=>$a->idAzienda])}}">
                    <br><br>
                </form>
            @endforeach

        @else
            <form method="POST" action="{{ route('createAzienda') }}" enctype="multipart/form-data">
                @csrf
                <center>
                <label for="nomeAzienda">Nome Azienda: </label>
                <input type="text" id="nomeAzienda" name="nomeAzienda">
                @if ($errors->first('nomeAzienda'))
                    <ul class="errore">
                        @foreach ($errors->get('nomeAzienda') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                    <br><br><br>
                <label for="ragioneSociale">Ragione Sociale:</label>
                <input type="text" id="ragioneSociale" name="ragioneSociale">
                @if ($errors->first('ragioneSociale'))
                    <ul class="errore">
                        @foreach ($errors->get('ragioneSociale') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                    <br><br><br>
                <label for="localizzazione">Localizzazione:</label>
                <input type="text" id="localizzazione" name="localizzazione">
                @if ($errors->first('localizzazione'))
                    <ul class="errore">
                        @foreach ($errors->get('localizzazione') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                    <br><br><br>
                <label for="logo">Logo:</label>
                <input type="file" id="logo" name="logo"><br><br>
                    @if ($errors->first('logo'))
                        <ul class="erroreLogo">
                            @foreach ($errors->get('logo') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                        <br>
                    @endif
                <label for="tipologia">Tipologia di azienda:</label>
                <input type="text" id="tipologia" name="tipologia">
                @if ($errors->first('tipologia'))
                    <ul class="errore">
                        @foreach ($errors->get('tipologia') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                    <br><br><br>
                <label for="descrizioneAzienda">Descrizione dell'azienda:</label>
                <textarea id="descrizioneAzienda" name="descrizioneAzienda"></textarea>
                @if ($errors->first('descrizioneAzienda'))
                    <ul class="erroreDescrizione">
                        @foreach ($errors->get('descrizioneAzienda') as $message)
                            {{$message }}
                        @endforeach
                    </ul>
                @endif
                </center>
                <br><br><br>
                <input type="submit" value="Crea Azienda">
                <br><br>
            </form>
        @endif



    </center>
@endsection
