<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Twoje zamowienia</title>
</head>
<body>
    <header class="flex-container">
        <div><h2>Lorem ipsum</h2><br></div>
            <div id="pages">
                <a href="{{ route('index') }}">Strona główna</a>
                <a href="{{ route('products') }}">Produkty</a>
                <a href="{{ route('contact') }}">Kontakt</a>
                <a href="{{ route('about') }}" id="selected">Informacje o stronie</a>
            </div>
            <div>Witaj <a href="{{ route('user') }}"><b>{{ session('user') }}</b></a></p></div>
    </header>
    <main><br>
    <table>
        <tr><td>Numer zamówienia</td><td>{{ $id }}</td></tr>
        <tr><td>Status zamówienia</td><td>
            @switch($status)
                @case(1)
                    Oczekuje na płatność
                    @break
                @case(2)
                    Kompletowanie zamówienia
                    @break
            @endswitch
        </td></tr>
        <tr><td>Zamawiający</td><td>{{ session('user')}}</td></tr>
        <tr><td colspan=2>Zawartość zamówienia</td></tr>
        <tr><th>Produkt</th><th>Ilość</th></tr>
        @foreach($produkty as $produkt)
            <tr>
                <td><a href='{{ $produkt["id"] }}'>{{ $produkt['nazwa'] }}</a>
                <td>{{ $produkt['ilosc'] }}</td>
            </tr>
        @endforeach
        <tr><td>Kwota końcowa</td><td>{{ $kwota }} PLN</td></tr>
</table>
    </main>
    <hr>
    <footer>
        © LolSoft 2023, licensed under <a href="https://raw.githubusercontent.com/ErikMcClure/bad-licenses/master/be-gay-do-crimes-license">be gay do crimes</a>

    </footer>
</body>
</html>