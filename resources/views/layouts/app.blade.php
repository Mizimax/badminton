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
    <link href="/css/wezync.css?v=5.6" rel="stylesheet">
    @yield('css')

</head>
<body>
    <div id="app">
      <!-- <div class="kaun-container">
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
      </div> -->
      <div class="menu-background"></div>
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
            @if (Auth::guest())
            <div class="menu-white org" style="position: relative;" onclick="window.location='{{ Auth::guest() ? '/login': '/logout'}}'">
                <div class="org-icon img-circle">
                    <i class="glyphicon {{ Auth::guest() ? 'glyphicon-log-in': 'glyphicon-log-out'}} middle font-big" style="color:#E6E6E6; position: absolute;" aria-hidden="true"></i>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="font-bold font-big">{{ Auth::guest() ? 'เข้าสู่ระบบ': 'ออกจากระบบ'}}</span>
            </div>
            @endif
            <hr style="border-color:#aaa; width: 90%; margin: 20px auto 0 auto; padding-bottom: 10px">
            <div class="font-white setting font-big">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="font-white menu-link" href="">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true" style="margin-right: 20px"></span>ตั้งค่า
                </a>
            </div>
            @if (Auth::guest())
                <!-- <div class="logout font-big">
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
                </div> -->
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
            <div style="position: relative;">
            
               
                @if (Auth::guest())
                    <!-- wait design login register -->
                    
                    <li class="navbar-user-profile maxnav visible-xs-block" style="padding-right: 0; margin: 8px 20px 0 0;  float:right">
                          <a href="#" id="dropdownMenu50" style="padding:0px;">
                              <img src="/images/no_pic.jpg" class="img-circle" height="50px" style="margin-right:7px">
                              <i class="glyphicon glyphicon-menu-down"></i>
                            </a>
                        </li>


                @else
                    <!-- Collapsed Hamburger -->
                    <a href="#" id="mobile-navv">
                        <button type="button" class="navbar-toggle collapsed">
                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="57px">
                        </button>
                    </a>
                    
                @endif
                <!-- <li class="menu">
                       <div id="nav-icon3">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                    </li> -->
                    <li class="menu">
                    <div class="navbar-cart pointer" onclick="window.location='{{ url('/coin_shop') }}'">
                        <img src="/images/cart.png" height="35"><br>
                        <span>coin shop</span>
                    </div>
                </li>

                <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.png" height="28">
                    </a>
            
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right pointer" style="margin:11px;padding: 0 20px; border:1px solid #ccc; border-radius: 10px">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="navbar-user-profile  visible-sm-block visible-md-block visible-lg-block" style="padding:3px 0">
                          <a href="#" id="dropdownMenu50" style="padding:0px;">
                              <img src="/images/no_pic.jpg" class="img-circle" height="50px" style="margin-right:7px">
                              <span class="font-bold" style="margin-right:7px">เข้าสู่ระบบ</span>
                              <i class="glyphicon glyphicon-menu-down"></i>
                            </a>
                        </li>
                        @else

          
                                <li class="navbar-user visible-sm-block visible-md-block visible-lg-block">
                                <div style="padding:7px">
                                        <span class="font-small user-name">{{ Auth::user()->name }}</span><br>
                                        <span class="user-coin"><img src="/images/coin.png" height="15">
                                            <i style="font-size:14px">&nbsp;&nbsp;{{Auth::user()->user_coin}}</i>
                                        </span>
                                    </div>
                                </li>
                                <li class="navbar-user-profile  visible-sm-block visible-md-block visible-lg-block" style="padding: 0">
                                    <a href="#" id="dropdownMenu5" style="padding:0px;">
                                        <img src="{{Auth::user()->user_profile}}" class="img-circle" height="50px" style="margin-right:7px">
                                        <i class="glyphicon glyphicon-menu-down"></i>
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
          <div class="flex" style="justify-content: center;">
            <div style="margin-right:30px; margin-top:10px"><img src="/images/true.png" alt="true" width="70"></div>
            <div style="margin-right:30px; transform:translateY(-20px)"><img src="/images/kmutt.png" alt="kmutt" width="60"></div>
            <div><img src="/images/startup-th.png" alt="startup thailand" width="100"></div>
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
                document.body.style.overflowY = 'hidden';
                document.body.style.marginRight = '10px';
                menuToggled = true;
            }
            else {
                document.body.style.overflowY = 'scroll';
                document.body.style.marginRight = '0';
                menuToggled = false;
            }
        })

        $(document).ready(function(){
            

            if(swalContent)
                swal(swalContent);

            $('.nav.navbar-nav.navbar-right, #mobile-navv, .maxnav').click(function(){
                $('.menu-background').toggleClass('open');
                $('.menu-content').toggleClass('open');

                menuCheck();
            });
            $('.menu-background').click(function(){
                $(this).toggleClass('open');
                $('.menu-content').toggleClass('open');

                menuCheck();
            });


        });
    </script>
</body>
</html>
