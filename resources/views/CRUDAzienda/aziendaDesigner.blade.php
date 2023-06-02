<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\aziendaEditor.css') }}">

@endsection

@section('content')

    <script>

        $(function validazioneDatiAzienda() {
            $('#nomeAzienda').on('keyup', function () {
                $value = $(this).val();
                if ($value) {
                    $('#all-data').hide();
                    $('#searched-content').show();
                } else {
                    $('#all-data').show();
                    $('#searched-content').hide();
                }
                $.ajax({
                    type: 'GET',
                    url: '{{route('filtri2')}}',
                    data: {'ricercaParola': $value},
                    success: function (data) {
                        console.log(data);
                        $('#searched-content').html(data);
                    },
                    error: function () {
                        alert('notFound')
                    }
                })
            })
        })

    </script>

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
                    <input type="text" id="nomeAzienda" name="nomeAzienda" value="{{$a->nomeAzienda}}"><br><br>
                    @if ($errors->first('nomeAzienda'))
                        <ul class="errore">
                            @foreach ($errors->get('nomeAzienda') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{$a->ragioneSociale}}"><br><br>
                    @if ($errors->first('ragioneSociale'))
                        <ul class="errore">
                            @foreach ($errors->get('ragioneSociale') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text"  name="localizzazione" value="{{$a->localizzazione}}"><br><br>
                    @if ($errors->first('localizzazione'))
                        <ul class="errore">
                            @foreach ($errors->get('localizzazione') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <label for="tipologia">Tipologia Azienda:</label>
                    <input type="text"  name="tipologia" value="{{$a->tipologia}}"><br><br>
                    @if ($errors->first('tipologia'))
                        <ul class="erroreTipologia2">
                            @foreach ($errors->get('tipologia') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif
                    <label for="logo">Logo:</label>
                    <input type="file"  name="logo" value="{{$a->logo}}"><br><br>
                    <label for="descrizioneAzienda">Descrizione Azienda:</label>
                    <textarea name="descrizioneAzienda">{{$a->descrizioneAzienda}}</textarea><br><br>
                    @if ($errors->first('descrizioneAzienda'))
                        <ul class="erroreDescrizione2">
                            @foreach ($errors->get('descrizioneAzienda') as $message)
                                {{ $message }}
                            @endforeach
                        </ul>
                    @endif

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
                <input type="text" id="nomeAzienda" name="nomeAzienda"><br><br>
                @if ($errors->first('nomeAzienda'))
                    <ul class="errore">
                        @foreach ($errors->get('nomeAzienda') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <label for="ragioneSociale">Ragione Sociale:</label>
                <input type="text" id="ragioneSociale" name="ragioneSociale"><br><br>
                @if ($errors->first('ragioneSociale'))
                    <ul class="errore">
                        @foreach ($errors->get('ragioneSociale') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <label for="localizzazione">Localizzazione:</label>
                <input type="text" id="localizzazione" name="localizzazione"><br><br>
                @if ($errors->first('localizzazione'))
                    <ul class="errore">
                        @foreach ($errors->get('localizzazione') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <label for="logo">Logo:</label>
                <input type="file" id="logo" name="logo"><br><br>
                <label for="tipologia">Tipologia di azienda:</label>
                <input type="text" id="tipologia" name="tipologia"><br><br>
                @if ($errors->first('tipologia'))
                    <ul class="erroreTipologia">
                        @foreach ($errors->get('tipologia') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
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
                <br><br>
                <input type="submit" value="Crea Azienda">
                <br><br>
            </form>
        @endif



    </center>
@endsection
