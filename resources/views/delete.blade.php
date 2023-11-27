<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/loginstyle.css') }}" />
    <title>Usuwanie konta</title>
</head>
<body>
    <main>
        <h2>Czy na pewno chcesz usunąć konto w serwisie?</h2>
        <br>
        <p><a href="{{ route('delete_account') }}"><button>Tak</button></a>
        <a href="{{ route('user') }}"><button>Nie</button></a></p>
    </main>
</body>
</html>