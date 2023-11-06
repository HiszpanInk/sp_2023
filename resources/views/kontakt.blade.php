<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Kontakt</title>
</head>
<body>
    <header class="flex-container">
        <div><h2>Lorem ipsum</h2><br></div>
            <div id="pages">
                <a href="{{ route('index') }}">Strona główna</a>
                <a href="#">Produkty</a>
                <a href="{{ route('contact') }}" id="selected">Kontakt</a>
                <a href="{{ route('about') }}">Informacje o stronie</a>
            </div>
            <div>Witaj <b>Username</b></p></div>
    </header>
    <main>
        <p>Ażeby skontaktować się w jakiejś sprawie prosimy o wypełnienie poniższego formularza</p>
        <form action="#" method="POST">
            <label for="content">Treść: </label><br>
            <textarea name="content"></textarea>
            <br><button type="submit">Wyślij</button>
        </form>
    </main>
    <hr>
    <footer>
        © LolSoft 2023, licensed under <a href="https://raw.githubusercontent.com/ErikMcClure/bad-licenses/master/be-gay-do-crimes-license">be gay do crimes</a>

    </footer>
</body>
</html>