<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/wezync.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header" align="center">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/event_detail/1') }}">
                        <img src="/images/logo.png" height="28">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a class="navbar-cart" href="{{ url('/') }}">
                                    <img src="/images/cart.png" height="35"><br>
                                    <span>coin shop</span>
                                </a>
                            </li>
                            <li class="navbar-user">
                                <a href="#">
                                    <span class="user-name">{{ Auth::user()->name }}</span><br>
                                    <span class="user-coin"><img src="/images/coin.png" height="15">
                                        &nbsp;&nbsp;1742
                                    </span>
                                </a>
                            </li>
                            <li class="navbar-user-profile">
                                <img src="{{Auth::user()->user_profile}}" class="img-circle" height="65px">
                            </li>
                            <li>
                            <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
          {{ csrf_field() }}
          <a class="ui red label" onclick="$('#logout-form').submit();">
            Logout
          </a>
        </form></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    
</body>
</html>
