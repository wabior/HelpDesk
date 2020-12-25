<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Help Desk</title>

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
                /* margin: 0; */
            }

            .navbar a{
                font-size: 1.3rem;
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>

        <div class="container">

            <div class="navbar">

                @if (Route::has('login'))
                    @auth

                    <nav class="navbar container navbar-expand-lg navbar-light bg-light  ">
                        <a class="navbar-brand mr-5" href="{{ url('/') }}">System zgłoszeń</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">

                                <a class="nav-item nav-link" href="{{ url('/tickets/create') }}">Nowe zgłoszenie</a>
                                <a class="nav-item nav-link" href="{{ url('/tickets') }}">Zgłoszenia</a>
                                {{-- <a class="nav-item nav-link" href="{{ url('/users') }}">Użytkownicy</a> --}}
                                <span class="nav-item nav-link mt-2 pr-1">Użytkownik:</span>
                                <a class="nav-item nav-link pl-0" href="{{ url('/tickets/user') }}">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                                <a class="nav-item nav-link " href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Wyloguj') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-inline">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </nav>

                    @else
                    <nav class="navbar navbar-light bg-light mx-auto">

                        <div class="navbar-nav flex-row">

                        <a class="nav-item nav-link p-3" href="{{ route('login') }}">Zaloguj</a>

                        @if (Route::has('register'))
                            <a class="nav-item nav-link p-3" href="{{ route('register') }}">Rejestracja</a>
                        @endif

    </div>

                    </nav>

                @endauth
                @endif
            </div>

        </div>
        <div class="container">
             @yield('content')
         </div>


    </body>
</html>
