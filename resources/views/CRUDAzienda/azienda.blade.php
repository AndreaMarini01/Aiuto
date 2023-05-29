<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDAzienda\infoAzienda.css') }}">
@endsection

@section('content')
    @if(!empty($info))
        @foreach($info as $azienda)
            <div class="titolo_azienda">
                <h1>{{$azienda->nomeAzienda}}</h1>
            </div>
            <br>
            <div class="immagine_azienda">
                <center>
                    <!--Da capire come inserire bene l'immagine-->
                    <img src="https://www.strunkmedia.com/wp-content/uploads/2018/05/bigstock-221516158.jpg" height="400px"width="400px">
                    <br>
                </center>
            </div>
            <div class="carattesristiche_azienda">
                <center>
                    <i>
                        <li>{{$azienda->localizzazione}}, {{$azienda->tipologia}}, {{$azienda->ragioneSociale}}</li>
                    </i>
                </center>
            </div>
            <br>
            <section>
                <center>
                    <div class="descrizione_azienda">
                        {{$azienda->descrizioneAzienda}}
                    </div>
                </center>
            </section>
        @endforeach
    @endif

@endsection
</html>
