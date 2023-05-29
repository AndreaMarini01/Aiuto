<!DOCTYPE html>
<html>
@extends('layout.layout')
@section('customCss')
    <link rel="stylesheet" type="text/css" href="{{URL('css\statistiche.css') }}">
@endsection
<script src=""></script>
@section('content')

    <?php $info = \App\Models\Coupon::all(); ?>
    <?php $infoUtenti = \App\Models\User::all(); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    $(function retroPromozioni(){
        $('button').click(function (){
            var buttonId=$(this).attr('id');
            var buttonNumber = buttonId.replace('visualInfoPromozione','');
            mostraRetroPromozione(buttonNumber)
        });
    });

    $(function avantiPromozioni(){
        $('button').click(function (){
            var buttonId=$(this).attr('id');
            var buttonNumber = buttonId.replace('retro_promozione_button','');
            mostraAvantiPromozione(buttonNumber)
        });
    });

    $(function retroUtenti(){
        $('button').click(function (){
            var buttonId=$(this).attr('id');
            var buttonNumber = buttonId.replace('visualInfoUtente','');
            mostraRetroUtente (buttonNumber)
        });
    });

    $(function avantiUtenti(){
        $('button').click(function (){
            var buttonId=$(this).attr('id');
            var buttonNumber = buttonId.replace('retro_utente_button','');
            mostraAvantiUtente(buttonNumber)
        });
    });

    function mostraRetroPromozione (buttonNumber){
        $("#promozione"+buttonNumber).hide();
        $("#retropromozione"+buttonNumber).show();
    }

    function mostraAvantiPromozione(buttonNumber){
        $("#promozione"+buttonNumber).show();
        $("#retropromozione"+buttonNumber).hide();
    }

    function mostraRetroUtente (buttonNumber){
        $("#utente"+buttonNumber).hide();
        $("#retroutente"+buttonNumber).show();
    }

    function mostraAvantiUtente(buttonNumber){
        $("#utente"+buttonNumber).show();
        $("#retroutente"+buttonNumber).hide();
    }

    </script>

    <div class="Titolo"><h1>Statistiche</h1></div>
    <div class="numeroCoupon">Numero totale di coupon emessi: {{sizeof($info)}}</div>
    <hr>
    <div class="tipoStatistica">Seleziona il coupon di cui vuoi sapere le informazioni: </div>
    @for($i=0;$i<=sizeof($info)-1;$i++)
        <div class="promozione" id="promozione{{$i}}">
            <div><p id="idCoupon"> Nome offerta: {{$info[$i]['idCoupon']}} </p></div>
            <div><p id="oggetto"> Oggetto offerta: {{$info[$i]['oggetto']}} </p></div>
            <button class="statsButton" id="visualInfoPromozione{{$i}}">Visualizza Info</button>
        </div>
        <div class="retropromozione" id="retropromozione{{$i}}">
            <p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue;
                and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.
                These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best,
                every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to
                be repudiated and annoyances accepted. </p>
            <button class="statsButton" id="retro_promozione_button{{$i}}">Indietro</button>
        </div>
    @endfor
    <hr>
    <div class="tipoStatistica">Seleziona l'utente di cui vuoi sapere le informazioni: </div>
    @for($j=0;$j<=sizeof($infoUtenti)-1;$j++)
        <div class="utente" id="utente{{$j}}" >
            <div><p id="username"> Nome utente: {{$infoUtenti[$j]['username']}} </p></div>
            <div><p id="email"> Email: {{$infoUtenti[$j]['email']}} </p></div>
            <button class="statsButton" id="visualInfoUtente{{$j}}">Visualizza Info</button>
        </div>
        <div class="retroutente" id="retroutente{{$j}}">
            <p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue;
                and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.
                These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best,
                every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to
                be repudiated and annoyances accepted. </p>
            <button class="statsButton" id="retro_utente_button{{$j}}">Indietro</button>
        </div>

    @endfor



@endsection
</html>
