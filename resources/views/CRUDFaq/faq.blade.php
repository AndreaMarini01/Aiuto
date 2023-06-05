<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDFaq\faq.css') }}">
@endsection

@section('content')
    <br>
    <br>
    <!-- ogni faq sarà serializzata
            La funzione di interesse prenderà i dati da db, poi con un foreach produrrà tutti i risultati utili
         -->


    @if(!empty($faq))
        @foreach ($faq as $xfaq)
            <button class="domanada-faq">{{ $xfaq->domanda }}</button>
            <div class="risposta">
                <p>{{ $xfaq->risposta }}</p>

                @if(isset(Auth::user()->nome))
                    @can('isAdmin')
                        <div class="faq-opt" style="float: right; display: inline">
                            <a class="faq-btn" href="{{route('faqedit',['id'=>$xfaq->id], ['option'=>'edit'])}}">Modifica
                                FAQ</a>&nbsp;
                            <a class="faq-btn" href="{{route('faqdelete',['id'=>$xfaq->id])}}">Elimina
                                FAQ</a>
                        </div>
                    @endcan
                @endif
            </div>
        @endforeach
    @endif
    @if(isset(Auth::user()->nome))
        @can('isAdmin')
            <br><br>
            <center>
                <a class="faq-btn" href="{{route('faqedit',['id'=>'create'], ['option'=>'create'])}}">Inserisci una nuova FAQ
                </a>
            </center>
        @endcan
    @endif


    <script>
        var acc = document.getElementsByClassName("domanada-faq");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

@endsection
</html>
