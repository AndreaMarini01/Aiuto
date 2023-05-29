<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDFaq\faqDesigner.css') }}">
@endsection

@section('content')
    <br>
    <center>
        @if($option=='edit')
            <h2>Modifica Faq</h2>
        @endif
        @if($option=='create')
            <h2>Crea Nuova Faq</h2>
        @endif
        <div>
            <form>
                @if(isset($faq))
                    @foreach($faq as $xfaq)

                        <label for="domanda">domanda</label>
                        <textarea id="domanda" name="domanda" rows="4" cols="50" required>{{$xfaq->domanda}}</textarea>
                        <br>
                        <label for="risposta">risposta </label>
                        <textarea id="risposta" name="risposta" rows="4" cols="50" required>{{$xfaq->risposta}}</textarea>
                        <br>
                        <input type="submit" value="Modifica Faq" formaction="{{route('salvaFaq', ['id'=>$xfaq->id])}}">
                    @endforeach
                @else
                    <label for="domanda">Inserisci una nuova domanda</label>
                    <textarea id="domanda" name="domanda" rows="4" cols="50" required></textarea>
                    <br>
                    <label for="risposta">Inserisci una nuova risposta</label>
                    <textarea id="risposta" name="risposta" rows="4" cols="50" required></textarea>
                    <br>
                    <input type="submit" value="Crea Faq"formaction="{{route('creaFaq')}}">
                @endif



            </form>


        </div>
    </center>
@endsection

</html>
