<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SportsDirector') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body background="{{ asset('images/background.jpeg') }}">
    <div id="main">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="navbar-form navbar-right">
                        @if(Auth::check())
                            <strong>{{ Auth::user()->email }}</strong>
                            <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                                <a href="{{ route('login') }}"  class="btn btn-success">Sign in</a>
                                <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                        @endif
                    </div>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
        @include('menus.hamburger-menu')
        @yield('primary')
        <div class="container">
            @include('flash::message')
            @yield('content')
            <hr>
            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
        </div> <!-- /container -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
