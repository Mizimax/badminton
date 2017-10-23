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
                @if (Auth::guest())
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                @else
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="65px">
                    </button>
                @endif
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.png" height="28">
                    </a>
                </div>
            
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <div class="visible-xs-block">
                            <li class="navbar-user" style="padding-left:5px">
                                <a href="#">
                                    
                                    <span class="user-name">{{ Auth::user()->name }}</span>
                                    <span class="user-coin"><img src="/images/coin.png" height="15">
                                        &nbsp;&nbsp;{{Auth::user()->user_coin}}
                                    </span>
                                </a>
                            </li>
                            <li style="padding-top :10px;padding-left:5px">
                                <a href="{{ url('/coin_shop') }}">
                                Coin shop
                                </a>
                            </li>
                            <li style="padding-left:5px">
                                <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
                                {{ csrf_field() }}
                                    <a  onclick="$('#logout-form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </li>
                            </div>
                                <li class="visible-sm-block visible-md-block visible-lg-block">
                                    <a class="navbar-cart" href="{{ url('/coin_shop') }}">
                                        <img src="/images/cart.png" height="35"><br>
                                        <span>coin shop</span>
                                    </a>
                                </li>
                                <li class="navbar-user visible-sm-block visible-md-block visible-lg-block">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="user-name">{{ Auth::user()->name }}</span><br>
                                        <span class="user-coin"><img src="/images/coin.png" height="15">
                                            &nbsp;&nbsp;{{Auth::user()->user_coin}}
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu" style="margin-top:7px;width:202px;left:0px">
                                        <li>
                                            <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
                                            {{ csrf_field() }}
                                                <a onclick="$('#logout-form').submit();">
                                                    Logout
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar-user-profile  visible-sm-block visible-md-block visible-lg-block">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding:0px;">
                                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="65px">
                                    </a>
                                    <ul class="dropdown-menu" style="margin-top:1px">
                                        <li>
                                            <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
                                            {{ csrf_field() }}
                                                <a onclick="$('#logout-form').submit();">
                                                    Logout
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                
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
