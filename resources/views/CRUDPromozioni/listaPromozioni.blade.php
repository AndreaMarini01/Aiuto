<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\CRUDPromozioni\listaPromozioni.css') }}">

@endsection

@section('content')

    <?php $info = \App\Models\Promozione::all(); ?>



    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <script>
        $(function aperturaFiltri() {
            $('#filter-button').click(function () {
                $('#filtri').slideToggle();
            })
        })

        $(function chiusuraFiltri() {
            $('#close-button').click(function () {
                $('#filtri').slideToggle();
            })
        })

    </script>

    <script>
        $(function ricercaFiltribyName() {
            $('#ricercaAzienda').on('keyup', function () {
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
                    url: '{{route('filtri')}}',
                    data: {'ricercaAzienda': $value},
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

        $(function ricercaFiltribyWords() {
            $('#ricercaParola').on('keyup', function () {
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

        $(function ricercaFiltribyNameAndWords() {
            $value1 = $('#ricercaAzienda').val();
            $value2 = $('#ricercaParolaa').val();
            if ($value1 && $value2) {
                $('#all-data').hide();
                $('#searched-content').show();
            } else {
                $('#all-data').show();
                $('#searched-content').hide();
            }
            $.ajax({
                type: 'GET',
                url: '{{route('filtri3')}}',
                data: {'ricercaParola': $value, 'ricercaAzienda': $value},
                success: function (data) {
                    console.log(data);
                    $('#searched-content').html(data);
                },
                error: function () {
                    alert('notFound')
                }
            })

        })

    </script>

    @if (!Auth::check() or Gate::allows('isUser'))
        <div class="horizontal">
            <button id=filter-button type="button">FILTRI</button>
            <div id="filtri" class="filtri">
                <p>Barra di ricerca per i filtri:</p>
                <label>Cerca nome azienda</label>
                <input type="text" name="ricercaAzienda" id="ricercaAzienda"/>
                <label>Cerca parola chiave</label>
                <input type="text" name="ricercaParola" id="ricercaParola"/>
                <button id=close-button type="button">X</button>
            </div>
        </div>
        <br><br><br><br><br>
    @endif

    <div id="all-data">
        @foreach($listaPromozioni as $promozione)
            @csrf
            <div class="promozione">
                <div><p id="nomePromozione"> Nome offerta: {{$promozione->nomePromozione}} </p></div>
                <div><p id="oggetto"> Oggetto offerta: {{$promozione->oggetto}} </p></div>
                <!-- Da mettere il middleware in modo che sogli gli utenti staff possano vederlo -->
                @can('isStaff')
                    <div>
                        <div class="bottoni1"><input type="submit" value="MODIFICA" onclick="location.href='{{route('modificaPromozione', ['idPromozione'=>$promozione->idPromozione])}}';">
                        </div>
                        <div class="bottoni2"><input type="submit" value="VISUALIZZA" onclick="location.href='{{route('visualPromozione', ['idPromozione'=>$promozione->idPromozione])}}';">
                        </div>
                    </div>
                @endcan
                @can('isUser')
                    <div>
                        <button type="submit"
                                onclick="location.href='{{route('salvaCoupon', ['idPromozione'=>$promozione->idPromozione])}}';">
                            Salva coupon
                        </button>
                    </div>
                @endcan
            </div>

        @endforeach
        <br><br>
    </div>


    <div id="searched-content" class="searched-content"></div>

    <!-- Da mettere il middleware in modo che sogli gli utenti staff possano vederlo -->
    @can('isStaff')
        <div class="aggiungiOfferta">
            <button type="submit" onclick="location.href='{{route('promozioneCreator')}}';">+</button>
        </div>
    @endcan
    <br>
@endsection


</html>
