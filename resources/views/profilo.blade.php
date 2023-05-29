<!DOCTYPE html>
<html>
@extends('layout.layout')
<link rel="stylesheet" type="text/css" href="{{URL('css\profilo.css') }}">

@section('content')

    <h1>Il Mio Profilo</h1>
    <p>Benvenuto nel tuo profilo personale!</p>
    <table>
        <tr>
            <th>Username:</th>
            <td>nomeutente</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>nomeutente@email.com</td>
        </tr>
        <tr>
            <th>Nome:</th>
            <td>Mario</td>
        </tr>
        <tr>
            <th>Cognome:</th>
            <td>Rossi</td>
        </tr>
        <tr>
            <th>Telefono:</th>
            <td>1234567890</td>
        </tr>
        <tr>
            <th>Data di nascita:</th>
            <td>01/01/1990</td>
        </tr>
        <tr>
            <th>Genere:</th>
            <td>Maschio</td>
        </tr>
        <tr>
            <th>Numero Coupon salvati:</th>
            <td>4</td>
        </tr>
    </table>
    <button onclick="visualizzaCoupon()">Visualizza Coupon Salvati</button>
    <form>
        <h2>Modifica i tuoi dati personali</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome"><br><br>
        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono"><br><br>
        <label for="data-nascita">Data di nascita:</label>
        <input type="date" id="data-nascita" name="data-nascita"><br><br>
        <label for="genere">Genere:</label>
        <select id="genere" name="genere">
            <option value="maschio">Maschio</option>
            <option value="femmina">Femmina</option>
            <option value="altro">Altro</option>
        </select><br><br>
        <button type="submit">Salva Modifiche</button>

    </form>
@endsection
