<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Informacje o stronie</title>
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
    <main>
        <h3>Strona</h3>
        <p>Kod strony znajduje się w serwisie GitHub <a href="https://github.com/HiszpanInk/sp_2023">o tutaj</a></p>
        <h3>Sklep</h3>
        <p>Adres sklepu:<br>ul. Dionizego Czachowskiego 21a,<br>26-600 Radom,<br>Województwo mazowieckie, Polska</p>
    </main>
    <hr>
    <footer>
        © LolSoft 2023, licensed under <a href="https://raw.githubusercontent.com/ErikMcClure/bad-licenses/master/be-gay-do-crimes-license">be gay do crimes</a>

    </footer>
</body>
</html>