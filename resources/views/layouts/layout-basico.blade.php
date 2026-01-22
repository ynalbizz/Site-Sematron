<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Minha Aplicação')</title>
        <link rel="stylesheet" href="{{asset('/sematron.css')}}">
        <link rel="stylesheet" href="{{asset('/reset.css')}}">
        <!--Importando o Java-->
        <script src="{{asset('javaDaSematron/ver-senha.js') }}" defer></script>
        <script src="{{asset('javaDaSematron/inscricao.js') }}" defer></script>
        <!--Isso é onde tem o olhinho da senha-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!--Aqui em baixo importa a fonte. POR QUE CARALHOS INTER???????????? AQUI É GRÊMIO PORRA!!!!!!-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    </head>

    <body class="Corpo">

        @include('layouts.parciais.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.parciais.footer')
        
    </body>

</html>