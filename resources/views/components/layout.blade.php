<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FortNine Cart</title>
    <link href="{{ asset('css/checkout/cart/styles.css?v=').time() }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="{{ asset('js/checkout/cart.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="nav-wrapper">
        <nav>
            <div class="logo-wrapper">
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" />
                    <span>FortNine Cart Test</span>
                </a>
            </div>
        </nav>
    </div>
    {{ $slot }}
</body>
</html>
