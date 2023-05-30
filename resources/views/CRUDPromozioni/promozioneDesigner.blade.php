<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\promozioneEditor.css') }}">
@endsection

@section('content')
    @if($option == 'edit')
        <h2>Modifica Azienda</h2>

    @endif
    @if($option == 'create')
        <h2>Crea nuova azienda</h2>
    @endif
    <center>

        @if(isset($promozione))
            @foreach($promozione as $promo)

                <center><form method="POST" class="form">
                        @csrf
                        <h2>Modifica i dati della promozione:</h2>
                        <label for="idCoupon">Nome Coupon:</label>
                        <input name="idCoupon" id="idCoupon" value="{{$promo->idCoupon}}"><br><br>
                        <label for="oggetto">Oggetto:</label>
                        <input type="text" id="oggetto" name="oggetto" value="{{$promo->oggetto}}"><br><br>
                        <label for="modalità">Modalità:</label>
                        <input type="text" id="modalità" name="modalità" value="{{$promo->modalità}}"><br><br>
                        <label for="scontistica">Scontistica:</label>
                        <input type="text" id="scontistica" name="scontistica" value="{{$promo->scontistica}}"><br><br>
                        <label for="luogoFruizione">Luogo fruizione:</label>
                        <input type="text" id="luogoFruizione" name="luogoFruizione" value="{{$promo->luogoFruizione}}"><br><br>
                            <?php $info = \App\Models\Azienda::all(); ?>
                        <select id="Azienda" name="Azienda">
                        @for($i=0;$i<=sizeof($info)-1;$i++)

                                <option value="{{$info[$i]['nomeAzienda']}}">{{$info[$i]['nomeAzienda']}}</option>
                                @endfor
                            </select><br><br>
                            <input type="submit" value="Salva Modifiche" formaction="{{route('editPromozione',['id'=>$promo->idCoupon])}}">
                            <input type="submit" value="ELIMINA" formaction="{{route('eliminaPromozione',['idCoupon'=>$promo->idCoupon])}}">
                    </form></center>
            @endforeach
        @else
            <form method="POST" class="form">
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
                    <?php $info = \App\Models\Azienda::all(); ?>
                @for($i=0;$i<=sizeof($info)-1;$i++)
                    <select id="Azienda" name="Azienda">
                        <option value="{{$info[$i]['nomeAzienda']}}">{{$info[$i]['nomeAzienda']}}</option>
                        @endfor
                    </select><br><br>
                    <input type="submit" value="Crea" formaction="{{route('creaPromozione')}}">
            </form></center>
@endif


@endsection

