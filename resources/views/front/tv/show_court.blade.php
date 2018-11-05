<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/wezync.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
</head>
<body style ="background-color:#fff">
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4" align="center"><h1>สถานะสนาม</h1></div>
        <div class="col-xs-4"></div>
    </div>
    <div class="row">
        @foreach($court as $c)
        <div class="col-xs-2" style="margin:10 0px">
            @if($c->court_status == "เรียกลงสนาม")
            <table class="table-bordered table-orange" width="100%">
            @elseif($c->court_status == "ว่าง")
            <table class="table-bordered table-gray" width="100%">
            @else
            <table class="table-bordered table-court" width="100%">
            @endif
                <tr>
                    <td  align="center"><h1>{{$c->court_number}}</h1></td>
                </tr>
                <tr>
                    <td  align="center" height="150px">match<br><h2>{{$c->court_match_id}}</h2></td>
                </tr>
                <tr>
                    <td  align="center"><h2>{{$c->court_status}}</h2></td>
                </tr>
            </table>
        </div>
        @endforeach
    </div>
</div>
</body>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127412532-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-127412532-1');
</script>
