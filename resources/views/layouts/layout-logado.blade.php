<!DOCTYPE html>
<html style="margin: 0;
    padding: 0;
    height: 100%;"">

    @include('layouts.parciais.head')

    <body class="Corpo" style="min-height: 60vh">

        @include('layouts.parciais.header-log')

        <main>
            @yield('content')
        </main>

        @include('layouts.parciais.footer')
        
    </body>

</html>

