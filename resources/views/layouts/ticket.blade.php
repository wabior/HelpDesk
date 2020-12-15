<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .flex-top {
                align-items: ;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="flex-top position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                            <a class="navbar-brand" href="{{ url('/') }}">System zgłoszeń</a>
                        @auth
                            <a href="{{ url('/tickets/create') }}">Nowe zgłoszenie</a>
                            <a href="{{ url('/tickets') }}">Zgłoszenia</a>
                            <a href="{{ url('/users') }}">Użytkownicy</a>
                            <a href="#" role="button">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif

                        @endauth
                </div>

                <div class="container mt-5">
                    @yield('content')

                </div>

            @endif
        </div>

    </body>
</html>
