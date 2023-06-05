<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\promozioneEditor.css') }}">
@endsection

@section('content')
    <center>
        <?php $info = \App\Models\Azienda::all(); ?>
        @if(sizeof($info)==0)
            <p class="noAziende">Non ci sono registrate aziende nel sito</p>
            <center><div class="bottone_indietro"><button  onclick="location.href='{{route('listaPromozioni')}}';">Indietro</button> </div></center>
        @else
            @if($option == 'edit')
                <h2>Modifica Promozione</h2>

            @endif
            @if($option == 'create')
                <h2>Crea nuova promozione</h2>
            @endif
        @if(isset($promozione))
            @foreach($promozione as $promo)

                <center><form method="POST" class="form">
                        @csrf
                        <h2>Modifica i dati della promozione:</h2>
                        <label for="nomePromozione">Nome Coupon:</label>
                        <input type= "text"name="nomePromozione" id="nomePromozione" value="{{$promo->nomePromozione}}">
                        @if ($errors->first('nomePromozione'))
                            <ul class="errore">
                                @foreach ($errors->get('nomePromozione') as $message)
                                    {{ $message }}
                                @endforeach
                            </ul>
                        @endif
                        <br><br>
                        <label for="oggetto">Oggetto:</label>
                        <input type="text" id="oggetto" name="oggetto" value="{{$promo->oggetto}}">
                        @if ($errors->first('oggetto'))
                            <ul class="errore">
                                @foreach ($errors->get('oggetto') as $message)
                                    {{ $message }}
                                @endforeach
                            </ul>
                        @endif
                        <br><br>
                        <label for="modalità">Modalità:</label>
                        <input type="text" id="modalità" name="modalità" value="{{$promo->modalità}}">
                        @if ($errors->first('modalità'))
                            <ul class="errore">
                                @foreach ($errors->get('modalità') as $message)
                                    {{ $message }}
                                @endforeach
                            </ul>
                        @endif
                        <br><br>
                        <label for="scontistica">Scontistica:</label>
                        <input type="text" id="scontistica" name="scontistica" value="{{$promo->scontistica}}">
                        @if ($errors->first('scontistica'))
                            <ul class="errore">
                                @foreach ($errors->get('scontistica') as $message)
                                    {{ $message }}
                                @endforeach
                            </ul>
                        @endif
                        <br><br>
                        <label for="luogoFruizione">Luogo Fruizione:</label>
                        <input type="text" id="luogoFruizione" name="luogoFruizione" value="{{$promo->luogoFruizione}}">
                        @if ($errors->first('luogoFruizione'))
                            <ul class="errore">
                                @foreach ($errors->get('luogoFruizione') as $message)
                                    {{ $message }}
                                @endforeach
                            </ul>
                        @endif
                        <br><br>
                        <label>Azienda:</label>
                        @for($i=0;$i<=sizeof($info)-1;$i++)
                            <select id="Azienda" name="Azienda">
                                <option value="{{$info[$i]['nomeAzienda']}}">{{$info[$i]['nomeAzienda']}}</option>
                                @endfor
                            </select>
                            <br><br>
                            <label for="dataScadenza">Data di scadenza:</label>
                            <input type="date" id="dataScadenza" name="dataScadenza" value="{{$promo->dataScadenza}}">
                            @if ($errors->first('dataScadenza'))
                                <ul class="errore">
                                    @foreach ($errors->get('dataScadenza') as $message)
                                        {{ $message }}
                                    @endforeach
                                </ul>
                            @endif
                            <br><br>
                            <input type="submit" value="Salva Modifiche" formaction="{{route('editPromozione',['id'=>$promo->idPromozione])}}">
                            <input type="submit" value="ELIMINA" formaction="{{route('eliminaPromozione',['idPromozione'=>$promo->idPromozione])}}">
                    </form></center>
            @endforeach
            <br><br>
        @else
            <form method="POST" class="form">
                @csrf
                <label for="nomePromozione">Nome Offerta: </label>
                <input type="text" id="nomePromozione" name="nomePromozione">
                @if ($errors->first('nomePromozione'))
                    <ul class="errore">
                        @foreach ($errors->get('nomePromozione') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <label for="oggetto">Oggetto:</label>
                <input type="text" id="oggetto" name="oggetto">
                @if ($errors->first('oggetto'))
                    <ul class="errore">
                        @foreach ($errors->get('oggetto') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <label for="modalità">Modalità:</label>
                <input type="text" id="modalità" name="modalità">
                @if ($errors->first('modalità'))
                    <ul class="errore">
                        @foreach ($errors->get('modalità') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <label for="scontistica">Scontistica:</label>
                <input type="text" id="scontistica" name="scontistica">
                @if ($errors->first('scontistica'))
                    <ul class="errore">
                        @foreach ($errors->get('scontistica') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <label for="luogoFruizione">Luogo Fruizione:</label>
                <input type="text" id="luogoFruizione" name="luogoFruizione">
                @if ($errors->first('luogoFruizione'))
                    <ul class="errore">
                        @foreach ($errors->get('luogoFruizione') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <label for="Azienda">Azienda: </label>
                    <?php $info = \App\Models\Azienda::all(); ?>
                <select id="Azienda" name="Azienda">
                    @for($i=0;$i<=sizeof($info)-1;$i++)
                        <option value="{{$info[$i]['nomeAzienda']}}">{{$info[$i]['nomeAzienda']}}</option>
                    @endfor
                </select><br><br>
                <label for="dataScadenza">Data di scadenza:</label>
                <input type="date" id="dataScadenza" name="dataScadenza">
                @if ($errors->first('dataScadenza'))
                    <ul class="erroreScadenza">
                        @foreach ($errors->get('dataScadenza') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <input type="submit" value="Crea" formaction="{{route('creaPromozione')}}">
            </form></center>
            <br><br>
@endif
@endif

@endsection
