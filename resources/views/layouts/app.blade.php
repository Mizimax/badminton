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
</head>
<body>
    <div id="app">
        <div class="menu-background"></div>
        <div class="menu-content">
            <div class="menu-white coin">
                <div class="org-icon coin-icon img-circle">
                    <img src="/images/cart.png" class="absolute middle" width="30">
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="font-bold font-big" style="color:#EF9729">Coin Shop</i>
            </div>
            <div class="menu-white org" style="position: relative;">
                <div class="org-icon img-circle">
                    <i class="glyphicon glyphicon-user middle font-big" style="color:#E6E6E6; position: absolute;" aria-hidden="true"></i>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="font-bold font-big">สมัครเป็นผู้จัด</span>
            </div>
            <hr style="border-color:#aaa; width: 90%; margin: 20px auto 0 auto; padding-bottom: 10px">
            <div class="font-white setting font-big">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="font-white menu-link" href="">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true" style="margin-right: 20px"></span>ตั้งค่า
                </a>
            </div>
            <div class="logout font-big">
                
                <form id="logout-form" action="/logout" method="POST">
                {{ csrf_field() }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="menu-link" onclick="$('#logout-form').submit();">
                       <span class="glyphicon glyphicon-log-out" aria-hidden="true" style="margin-right: 20px"></span>ออกจากระบบ
                    </a>
                </form>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid" style="position: relative;">
            
               
                @if (Auth::guest())
                    <!-- wait design login register -->
                @else
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed">
                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="57px">
                    </button>
                @endif
                
                <li class="menu">
                       <div id="nav-icon3">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                    </li>

                <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.png" height="28">
                    </a>
            
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 20px">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="menu-item"><a href="{{ route('login') }}"><span class="absolute middle">Login</span></a></li>
                            <li class="menu-item"><a href="{{ route('register') }}"><span class="absolute middle">Register</span></a></li>
                        @else

                                <li class="visible-sm-block visible-md-block visible-lg-block">
                                    <div class="navbar-cart" href="{{ url('/coin_shop') }}">
                                        <img src="/images/cart.png" height="35"><br>
                                        <span>coin shop</span>
                                    </div>
                                </li>
                                <li class="navbar-user visible-sm-block visible-md-block visible-lg-block">
                                <a style="margin-top: 3px">
                                        <span class="font-small user-name">{{ Auth::user()->name }}</span><br>
                                        <span class="user-coin"><img src="/images/coin.png" height="15">
                                            <i>&nbsp;&nbsp;{{Auth::user()->user_coin}}</i>
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
                                    <a style="padding:0px;">
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">

        var menuToggled = false;

        var menuCheck = (function() {
            if(!menuToggled){
                document.body.style.overflow = 'hidden';
                menuToggled = true;
            }
            else {
                document.body.style.overflow = 'scroll';
                menuToggled = false;
            }
        })

        $(document).ready(function(){

            $('#nav-icon3').click(function(){
                $(this).toggleClass('open');
                $('.menu-background').toggleClass('open');
                $('.menu-content').toggleClass('open');

                menuCheck();
            });
            $('.menu-background').click(function(){
                $('#nav-icon3').toggleClass('open');
                $(this).toggleClass('open');
                $('.menu-content').toggleClass('open');

                menuCheck();
            });
        });
    </script>

    @yield('scripts')
</body>
</html>
