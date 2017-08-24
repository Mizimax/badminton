<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OPEN | KMUTT - @yield('title')</title>

    <!-- Styles -->
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    @yield('style')

</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <div id="modal" class="login-popup">
        <a href="#" class="close"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-29.png" class="btn_close" title="Close Window" alt="Close" width="20%" style="position:absolute;bottom:-70px;left:50%;transform:translateX(-50%)"  /></a>
        <div id="modal-content">
            <!-- replace data here -->
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    @yield('script')

</body>
</html>
