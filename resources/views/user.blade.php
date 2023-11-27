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
                <a href="{{ route('about') }}">Informacje o stronie</a>
            </div>
            <div>Witaj <a href="" id="selected"><b>{{ session('user') }}</b></a></p></div>
    </header>
    <main>
        <h3>Panel kontrolny użytkownika</h3>
        Nazwa zalogowanego użytkownika:
        <h4>{{ session('user') }}</h4>
        
        <h3>Opcje</h3>
        <a href="{{ route('change_password_page') }}">Zmień hasło</a>
        <a href="{{ route('delete_account_page') }}">Usuń konto</a>
        <a href="{{ route('logout') }}">Wyloguj</a>
        <br>
    </main>
    <hr>
    <footer>
        © LolSoft 2023, licensed under <a href="https://raw.githubusercontent.com/ErikMcClure/bad-licenses/master/be-gay-do-crimes-license">be gay do crimes</a>

    </footer>
</body>
</html>