<!DOCTYPE html>
<html>

    @include('layouts.parciais.head')

    <body class="Corpo">

        @include('layouts.parciais.header-log')

        <main>
            @yield('content')
        </main>

        @include('layouts.parciais.footer')
        
    </body>

</html>