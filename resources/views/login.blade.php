<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/loginstyle.css') }}" />
    <title>Logowanie</title>
</head>
<body>
    <main>
        <form method="POST" action="#">
            @csrf <!-- {{ csrf_field() }} -->
            <div id="inputs">
                <label for="username">Nazwa użytkownika: </label><input type="text" name="username"><br>
                <label for="password">Hasło: </label><input type="password" name="password"><br><br>
            </div>
            <a href="{{ route('register_page') }}">Zarejestruj się</a><br><br>
            
            <button type="submit">Zaloguj</button>
        </form>
    </main>
</body>
</html>