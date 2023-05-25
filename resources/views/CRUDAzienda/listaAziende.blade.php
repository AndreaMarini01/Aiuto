<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\listaAzienda.css') }}">
@endsection
@section('content')

    <?php $info = \App\Models\Azienda::all(); ?>

    <ul>
        @for($i=0;$i<=sizeof($info)-1;$i++)
            <form method="POST" class="form">
                @csrf
                <div class="lista-aziende">
                    <li>
                        <div class="nomeAzienda"> <input name="id" value="{{$info[$i]['id']}}"> </div>
                        <img  src={{URL($info[$i]['logo'])}} height="200"width="200">
                        <div class="testolista"> {{$info[$i]['descrizioneAzienda']}}</div>
                        <div class="bottoni1"> <input type="submit" value="MODIFICA" formaction="{{route('modificaAzienda')}}"> </div>
                        <div class="bottoni2"> <input type="submit" value="VISUALIZZA" formaction="{{route('visualizzaAziendaPost')}}"> </div>
                    </li>
                </div>
            </form>
        @endfor
    </ul>

    <form action="{{route('creaAzienda')}}" method="POST" class="form">
        @csrf
        <div class="aggiungiAzienda"><button type="submit">+</button></div>
    </form>

@endsection
</html>
