<!DOCTYPE html>
<html>
@extends('layout.layout')

<link rel="stylesheet" type="text/css" href="{{URL('css\CRUDStaff\staffDesigner.css') }}">
@section('content')

@if($option == 'edit')
<h2>Modifica Staff</h2>

@endif
@if($option == 'create')
<h2>Crea nuovo membro dello staff</h2>
@endif

@if(isset($staff))
@foreach($staff as $membro)
<center>
    <form method="POST" class="form">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{$membro->username}}">
        @if(isset($erroreUsername))
            <ul class="errore">{{$erroreUsername}}</ul>
        @endif
        @if ($errors->first('username'))
            <ul class="errore">
                @foreach ($errors->get('username') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password">
        @if ($errors->first('password'))
            <ul class="errore">
                @foreach ($errors->get('password') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif<br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$membro->email}}">
        @if(isset($erroreEmail))
            <ul class="errore">{{$erroreEmail}}</ul>
        @endif
        @if ($errors->first('email'))
            <ul class="errore">
                @foreach ($errors->get('email') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value=" {{$membro->nome}}">
        @if ($errors->first('nome'))
            <ul class="errore">
                @foreach ($errors->get('nome') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" value="{{$membro->cognome}}">
        @if ($errors->first('cognome'))
            <ul class="errore">
                @foreach ($errors->get('cognome') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono" value="{{$membro->telefono}}">
        @if ($errors->first('telefono'))
            <ul class="errore">
                @foreach ($errors->get('telefono') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="datadinascita">Data di nascita:</label>
        <input type="date" id="datadinascita" name="datadinascita" value="{{$membro->datadinascita}}"><br><br>
        <label for="genere">Genere:</label>
        <select id="genere" name="genere">
            <option value="maschio">Maschio</option>
            <option value="femmina">Femmina</option>
            <option value="altro">Altro</option>
        </select><br><br>
        <input type="submit" value="Salva Modifiche" formaction="{{route('editStaff',['id'=>$membro->id])}}">
        <input type="submit" value="Elimina" formaction="{{route('eliminaStaff',['id'=>$membro->id])}}">
    </form>
</center>
@endforeach
    <br><br>
@else
<center>
    <form method="POST" class="form">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        @if(isset($erroreUsernameStaff))
            <ul class="errore">{{$erroreUsernameStaff}}</ul>
        @endif
        @if ($errors->first('username'))
            <ul class="errore">
                @foreach ($errors->get('username') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password">
        @if ($errors->first('password'))
            <ul class="errore">
                @foreach ($errors->get('password') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        @if(isset($erroreEmailStaff))
            <ul class="errore">{{$erroreEmailStaff}}</ul>
        @endif
        @if ($errors->first('email'))
            <ul class="errore">
                @foreach ($errors->get('email') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        @if ($errors->first('nome'))
            <ul class="errore">
                @foreach ($errors->get('nome') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome">
        @if ($errors->first('cognome'))
            <ul class="errore">
                @foreach ($errors->get('cognome') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono">
        @if ($errors->first('telefono'))
            <ul class="errore">
                @foreach ($errors->get('telefono') as $message)
                    {{ $message }}
                @endforeach
            </ul>
        @endif
        <br><br>
        <label for="datadinascita">Data di nascita:</label>
        <input type="date" id="datadinascita" name="datadinascita"><br><br>
        <label for="genere">Genere:</label>
        <select id="genere" name="genere">
            <option value="maschio">Maschio</option>
            <option value="femmina">Femmina</option>
            <option value="altro">Altro</option>
        </select><br><br>
        <input type="submit" value="Salva Modifiche" formaction="{{route('creaStaff')}}">
    </form>
</center>
<br><br>

@endif
@endsection
