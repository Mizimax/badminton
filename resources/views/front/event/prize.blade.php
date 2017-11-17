<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/wezync.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/prize.js?'.time()) }}"></script>
</head>
<body style="background: url(/images/events/1/special/bg.jpg) no-repeat ;background-size: cover;">
    <div id="app">
        
            <div class="container-fluid" >
                
                <div class="row" style="margin:100px">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4" align="center">
                        
                    </div>
                    <div class="col-xs-4"></div>
                </div>
                
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4" align="center">
                        <img onclick="get_lucky_person()" id="luckyperson_img" class="img-circle" height="100px" src="/images/no_pic.jpg">
                    </div>
                    <div class="col-xs-4"></div>
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4" align="center">
                        <h1 id="luckyperson">ผู้โชคดี </h1>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4" align="center">
                    <select id="rewards" name="rewards" class="form-control">
                        @foreach ($rewards as $reward)
                            <option value="{{$reward['special_rewards_id']}}">{{$reward['special_rewards_name']}}</option>
                        @endforeach
                    </select>
                    <input class="hidden" id="user_id" name="user_id" value="0">
                    <br>
                    
                    </div>
                    <div class="col-xs-4"></div>
                </div>
                <div class="row" style="margin:10px">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4" align="center">
                    </div>
                    <div class="col-xs-4"></div>
                </div>
            </div>
        
    </div>
</body>
</html>