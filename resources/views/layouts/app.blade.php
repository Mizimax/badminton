<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Wezync') }}</title>

    <!-- Styles -->
    <link href="/css/app.css?v=3" rel="stylesheet">
    <link href="/css/wezync.css?v=5" rel="stylesheet">
    @yield('css')

</head>
<body>
    <div id="app">
      <div class="kaun-container">
        <div class="kuan shadow" onclick="kuanToggle(this)">
          <div class="absolute middle">
            <i class="glyphicon glyphicon-play bottom-icon"></i>
          </div>
        </div>
        <div class="kuan-list">
          <div class="flex scroll-sm" style="height: 100%">
            <div class="kuan-title" align="center">
              ก๊วน<br>วัน<br>จันทร์
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            <div class="kuan-img" align="left">
              <div class="name">
                SINGHA HH<br>
                <span class="font-small">19.00 - 24.00</span><br>
                <span class="badge badge-orange">S</span> - <span class="badge badge-orange">C</span>
              </div>
            </div>
            
          </div>
        </div>
      </div>
        <div class="menu-bacsssskground"></div>
        <div class="menu-content">
            <div class="menu-white org" style="position: relative;" onclick="window.location='/'">
                <div class="org-icon img-circle">
                    <i class="glyphicon glyphicon-home middle font-big" style="color:#E6E6E6; position: absolute;" aria-hidden="true"></i>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="font-bold font-big">หน้าแรก</span>
            </div>
            <div class="menu-white coin" style="position: relative;" onclick="window.location='/coin_shop'">
                <div class="org-icon coin-icon img-circle">
                    <img src="/images/cart.png" class="absolute middle" width="30">
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="font-bold font-big" style="color:#EF9729">Coin Shop</i>
            </div>
            <div class="menu-white org" style="position: relative;" onclick="window.location='{{ (isOrganizer() || isAdmin() ) ? '/event/create' : '/org/register'}}'">
                <div class="org-icon img-circle">
                    <i class="glyphicon {{ isOrganizer() ? 'glyphicon-list-alt': 'glyphicon-user' }} middle font-big" style="color:#E6E6E6; position: absolute;" aria-hidden="true"></i>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="font-bold font-big">{{ (isOrganizer() || isAdmin() ) ? 'สร้างรายการ' :'สมัครเป็นผู้จัด'}}</span>
            </div>
            <hr style="border-color:#aaa; width: 90%; margin: 20px auto 0 auto; padding-bottom: 10px">
            <div class="font-white setting font-big">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="font-white menu-link" href="">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true" style="margin-right: 20px"></span>ตั้งค่า
                </a>
            </div>
            @if (Auth::guest())
                <div class="logout font-big">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="menu-link" href="/login?redirect={{ Request::path() }}">
                           <span class="glyphicon glyphicon-log-in" aria-hidden="true" style="margin-right: 20px"></span>เข้าสู่ระบบ
                        </a>
                </div>
                <div class="logout font-big font-white">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="menu-link" href="/register">
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 20px"></span>สมัครสมาชิก
                        </a>
                </div>
            @else
                <div class="logout font-big">
                
                    <form id="logout-form" action="/logout" method="POST">
                    {{ csrf_field() }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="menu-link" onclick="$('#logout-form').submit();">
                           <span class="glyphicon glyphicon-log-out" aria-hidden="true" style="margin-right: 20px"></span>ออกจากระบบ
                        </a>
                    </form>
                </div>
            @endif
        </div>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid" style="position: relative;">
            
               
                @if (Auth::guest())
                    <!-- wait design login register -->
                    <ul class="nav visible-xs-block" style="float: right">
                        <!-- Authentication Links -->
                               <li>
                                    <div class="navbar-cart pointer" onclick="window.location='{{ url('/coin_shop') }}'">
                                        <img src="/images/cart.png" height="35"><br>
                                        <span>coin shop</span>
                                    </div>
                                </li>

                                            </ul>

                @else
                    <!-- Collapsed Hamburger -->
                    <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <button type="button" class="navbar-toggle collapsed">
                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="57px">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-top:1px">
                        <li>
                            <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
                            {{ csrf_field() }}
                                <a onclick="$('#logout-form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                    </a>
                    
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
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li>
                                <div class="navbar-cart pointer" onclick="window.location='{{ url('/coin_shop') }}'">
                                    <img src="/images/cart.png" height="35"><br>
                                    <span>coin shop</span>
                                </div>
                            </li>
                            <li class="menu-item" style="margin-left: 10px;">
                                <a href="/login?redirect={{ Request::path() }}">
                                    <div class="input login absolute middle">
                                        <span style="margin: 0 auto">Login</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu-item" style="margin-left: 3px;">
                                <a href="{{ route('register') }}">
                                    <div class="input register absolute middle">
                                        <span style="margin: 0 auto">Register</span>
                                    </div>
                                </a>
                            </li>
                        @else

                                <li class="visible-sm-block visible-md-block visible-lg-block">
                                    <div class="navbar-cart pointer" onclick="window.location='{{ url('/coin_shop') }}'">
                                        <img src="/images/cart.png" height="35"><br>
                                        <span>coin shop</span>
                                    </div>
                                </li>
                                <li class="navbar-user visible-sm-block visible-md-block visible-lg-block">
                                <div style="padding:15px">
                                        <span class="font-small user-name">{{ Auth::user()->name }}</span><br>
                                        <span class="user-coin"><img src="/images/coin.png" height="15">
                                            <i>&nbsp;&nbsp;{{Auth::user()->user_coin}}</i>
                                        </span>
                                    </div>
                                </li>
                                <li class="navbar-user-profile  visible-sm-block visible-md-block visible-lg-block" style="padding-right: 0">
                                    <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding:0px;">
                                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="65px">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-top:1px">
                                        <a onclick="$('#logout-form').submit();">
                                        <li>

                                            <form style="margin-top:4px" id="logout-form" action="/logout" method="POST">
                                            {{ csrf_field() }}
                                                
                                                    Logout
                                                
                                            </form>
                                            
                                        </li>
                                        </a>
                                    </ul>
                                </li>
                                
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        <script type="text/javascript">
            var swalContent;
        </script>
        @if(Session::has('message'))
        <script type="text/javascript">
            var swalContent = {
                title: '{{ Session::get('title') }}',
                text: '{{ Session::get('message') }}',
                type: '{{ Session::get('type') }}'
            }
        </script>
        @endif
    </div>
    <div class="footer">
      <div class="container" style="padding: 40px 0">
        <div class="col-sm-6">
          <div class="flex">
            <div><img src="" alt=""></div>
            <div><img src="" alt=""></div>
            <div><img src="" alt=""></div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="contact-border font-small" style="margin-left: 10px; font-weight: bold; color: #ddd">ติดต่อ Wezync</div>
          <div class="flex flex-wrap font-small" style="margin-top: 10px; font-weight: 200; color: #ccc">
            <div class="pad-side-10">Tel: 086-359-2131</div>
            <div class="pad-side-10">Facebook: Wezync</div>
            <div class="pad-side-10">Line: @Wezync</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
    WebFont.load({
        google: {
            
            families: ['Prompt:200,400,600:thai']
        }
    });
    </script>
    <script src="/js/app.js?v=4"></script>
    <script src="/js/sweetalert2.js"></script>

    @yield('scripts')

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
            

            if(swalContent)
                swal(swalContent);

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
</body>
</html>
