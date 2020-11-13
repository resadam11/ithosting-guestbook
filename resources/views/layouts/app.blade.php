<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vendégkönyv</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(session()->has($msg))
                <div class="alert alert-{{ $msg }}">
                    {{ session()->get($msg) }}
                </div>
            @endif
        @endforeach

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-8">
                    @yield('content')
                </div>
            </div>
        </div>
        @yield('javascript')
    </body>
</html>