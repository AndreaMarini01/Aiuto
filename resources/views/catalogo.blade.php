
<!DOCTYPE html>
<html>

@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\catalogo.css') }}">
@endsection

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(function aperturaFiltri(){
        $('#filter-button').click(function(){
            $('#filtri').slideToggle();
        })
    })

    $(function chiusuraFiltri(){
        $('#close-button').click(function(){
            $('#filtri').slideToggle();
        })
    })
    </script>

    <script>

            $.ajax({
                type: 'POST',
                url: "{{ route('catalogoPost') }}",
                data: , //Inserire le aziende in formato JSON
                datatype: 'json',
                success: function (response) {
                    var aziendeDiv = $('#container');
                    response.forEach(function (azienda) {
                        aziendeDiv.append(
                            '<p>' + azienda.localizzazione + '</p>')
                    });
                }
        });
    </script>


    <div class="horizontal">
        <button id=filter-button type="button">FILTRI</button>
        <form action="{{route('catalogoPost')}}" method="POST" class="form">
            @csrf
        <div id="filtri" class="filtri">
                <p>Barra di ricerca per le parole chiave</p>
                <label>Cerca nome azienda</label>
                <input type="text" name="ricercaAzienda" id="ricercaAzienda"/>
                <label>Cerca parola chiave</label>
                <input type="text" name="ricercaParola"/>
                <input type="submit" value="CERCA">
                <button id=close-button type="button">X</button>
        </div>
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <div id=rectangle>
        <!-- offerta esempio, impostazione iniziale oggetti-->
        <div>
        <img src="https://www.doctorswork.it/wp-content/uploads/2020/06/img-box-qua-250x253.png" width="100px" height="100px">
        </div>

        <div id="container">

        </div>

    </div>
    <br>
@endsection
</html>

