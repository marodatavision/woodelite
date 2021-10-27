<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="{{ mix('js/app.js') }}" defer></script>
        
    </head>
    <body class="antialiased bg-gray-200">
        <div id="app"></div>
    </body>
</html>