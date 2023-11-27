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
        <form method="POST" action="{{ route('change_password') }}">
            @csrf <!-- {{ csrf_field() }} -->
            <div id="inputs">
                <label for="actual_password">Aktualne hasło: </label><input type="password" name="actual_password"><br><br>
                <label for="password">Nowe hasło: </label><input type="password" name="password"><br><br>
                <label for="password_repeat">Powtórz nowe hasło: </label><input type="password" name="password_repeat" required><br><br>
            </div>
            
            <button type="submit">Zmień hasło</button>
        </form>
    </main>
</body>
</html>