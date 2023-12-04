<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style_k.css') }}"/>
    <title>Koszyk</title>
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
        <h3>Zawartość zamówienia</h3>
        <table>
                <tr><th>Produkt</th><th>Ilość</th></tr>
                {!! $zawartosc_tabeli !!}
                
            </table><br>
            <b>Kwota do zapłacenia: {{ $cena }} PLN</b><br>
            <br>
            <form action="{{ route('create_order') }}" method="POST">
            <label for="payment">Forma płatności:</label>
                @csrf
            <select name="payment" id="payment-select">
                <option value="cash">Gotówka przy odbiorze</option>
                <option value="transfer">Przelew</option>
                </select>
                <br>
                <label for="delivery">Forma dostawy:</label>
                <select name="delivery" id="delivery-select">
                <option value="fedex">Kurier Fedex</option>
                <option value="inpost">InPost kurier</option>
                </select>
                <br><br>
                <button type="submit">Finalizuj zamówienie</button>
            </form>
        </div>
    </div>
</body>
</html>