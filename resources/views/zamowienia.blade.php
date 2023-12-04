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
    <ul>
        @foreach ($zamowienia as $zamowienie)
            <li><a href='{{ route("view_order", ["id" => $zamowienie["id"]]) }}'>{{ $zamowienie['tekst'] }}</a>
            <br>
            @switch($zamowienie['status'])
                @case(1)
                    Oczekuje na płatność
                    @break
                @case(2)
                    Kompletowanie zamówienia
                    @break
            @endswitch
        </li>
        @endforeach
</ul>
    </main>
    <hr>
    <footer>
        © LolSoft 2023, licensed under <a href="https://raw.githubusercontent.com/ErikMcClure/bad-licenses/master/be-gay-do-crimes-license">be gay do crimes</a>

    </footer>
</body>
</html>