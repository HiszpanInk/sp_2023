<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style_k.css') }}"/>
    <title>{{ $nazwa }}</title>
</head>
<body>
    <div class="container">
        <div id="headmother">
            <p id="hibitch">Witaj <a href="{{ route('user') }}">{{ session('user') }}</a></p>
            <h1>Sklepix Prezenty</h1>
            <div id="line"></div>
            <h3>Sklep z drobiazgami dla ludzi o specyficznym poczuciu humoru</h3>
        </div>
        <div id="headspawn">
            <ul>
                <li><a href="{{ route('about') }}">Informacje o stronie</a></li>
                <li><a href="{{ route('contact') }}">Kontakt</a></li>
                <li><a href="{{ route('products') }}">Produkty</a></li>
                <li><a href="{{ route('index') }}">Strona główna</a></li>
            </ul>
        </div>
        <div id="main">
            <table>
                <tr>
                    <td><h2>{{ $nazwa }}</h2></td>
                    <td rowspan=2><img src="{{ asset('/images/' . $obraz) }}" alt="{{ $nazwa }}" ></td>
                </tr>
                <tr><td>{{ $cena }} PLN
                <br><br>
                <a><button><h3>Dodaj do koszyka</h3></button></a>

                </td></tr>

            <tr><td colspan=2><h5>Opis</h5>
            <p>{{ $opis }}</p></td></tr>
            <tr><td colspan=2>Typ produktu: {{ $kategoria }}</td></tr>
            <table>
        </div>
    </div>
</body>
</html>