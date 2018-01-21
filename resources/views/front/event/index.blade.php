@extends('layouts.app')
@section('content')
<link href="{{ asset('css/event.css?'.time()) }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="row cover cover2" image-bg="{{$covers[0]}}">
    <div class="col-md-2"></div>
    <div class="col-md-8" style="padding: 0">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($covers as $k=>$cover)
                    @if ($k==0)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$k}}" class="active"></li>
                    @else
                        <li data-target="#carousel-example-generic" data-slide-to="{{$k}}"></li>
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
            @foreach ($covers as $k=>$cover)
                @if ($k==0)
                    <div class="item active">
                        <img class="cover-image" src="{{$cover}}">
                            <div class="carousel-caption">
                            </div>
                    </div>
                @else
                    <div class="item">
                    <img class="cover-image" src="{{$cover}}">
                        <div class="carousel-caption">
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row">
    <div class="container body-content shadow">
        <div class="row">
            <div class="col-md-12" align="center">
                <h1>{{$event->event_title}}</h1>
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" align="center">
            
            <button type="button" class="btn btn-lg btn-red" data-toggle="modal" data-target="#register_event_modal">สมัครแข่งขัน</button>
            
                
            </div>
        </div>
        <div class="row" style="height:20px;">
            <div class="col-md-12" align="center"></div>
        </div>    
        <div class="row">
            <div align="center" class="flex-container">
                <a href="#/detail" id="detail_tab2" >
                    <div class="detail button-detail">
                    <img class="menu-img" src="/images/events/detail_color.png" height="30" style="margin-bottom:6px;"><br>
                    รายละเอียด
                    </div>
                </a>
                <a href="#/member" id="member_tab2">
                    <div class="member button-detail">
                        <img class="menu-img" src="/images/events/list-player_color.png" height="30"style="margin-bottom:6px;"><br>
                        รายชื่อผู้แข่งขัน
                    </div>
                </a>
                <a href="#/match" id="match_tab2">
                    <div class="match button-detail" >
                        <img class="menu-img" src="/images/events/match_color.png" height="30"style="margin-bottom:6px;"><br>
                        สายและการแข่งขัน
                    </div>
                </a>
                <a href="#/picture" id="picture_tab2">
                    <div class="picture button-detail">
                <img class="menu-img" src="/images/events/picture_color.png" height="30"style="margin-bottom:6px;"><br>
                    รูปภาพ
                </div>
                </a>
            </div>
        </div>
        <div class="row" style="height:20px;">
            <div class="col-md-12" align="center"></div>
        </div>
        @if($event->event_id == 1)
        <div class="row">
            <div class="col-md-12" align="center">
                <button class="btn btn-warning" data-toggle="modal" data-target="#special_event_modal"> กิจกรรมพิเศษ</button>
            </div>
        </div>
        <br>
        @endif
         
    
    <div class="col-md-12 tab-content">
        <div role="tabpanel" class="tab-pane" id="detail">
            @if($event_id <= 3)
                @include('front/event/detail')
            @else
                @include('front/event/detail_create')
            @endif
        </div>
        <div role="tabpanel" class="tab-pane" id="member">
            <hr style="margin: 10px 0">
        <div class="row" style="padding: 10px 20px">
            <div class="col-xs-3 nopadding" align="center">
                <div style="display: inline-block;" align="left">
                    <p class="font-med color-black font-bold">อันดับมือ</p>
                    <div class="input" style="margin:0 auto;max-width: 100%; width: 170px;transform: translateY(-10%); font-size: 15px"><span class="display" style="text-align: center">เลือกอันดับ</span> <span class="icon dropdown">▼</span>
                    
                    </div>
                    <div class="input-dropdown event shadow-black">
                        <div class="item-dropdown" onclick="searchTable(this)"><div class="item">ทั้งหมด</div></div>
                        @foreach ($list_race as $race)
                        <div class="item-dropdown" onclick="searchTable(this)"><div class="item">{{$race->race_name}}</div></div>
                        @endforeach
                    </div>
                
                </div>

            </div>

            <div class="col-xs-9 nopadding flex-container space-around" style="margin-top:30px">

            @foreach($list_race as $race)
                
                    <div>
                        <span class="badge badge-orange">{{$race['race_name']}}</span>
                        {{$race['max_register']- $race['can_register']}} <b>/ {{$race['max_register']}}</b>
                    </div>
                
            @endforeach
            </div>
        </div>
            @include('front/event/member')
        </div>
        <div role="tabpanel" class="tab-pane" id="match">
            
            @include('front/event/match')
        </div>
        <div role="tabpanel" class="tab-pane" id="picture" style="height: 200px;"></div>
        <br><br>
    </div>



</div>
    <div class="col-md-2"></div>
</div>

<div class="alert">
    <div class="overlay"></div>
    <div class="fixed middle color-white" style="z-index:1001">
        ท่านต้องการลบ
        <span></span><br>
        หรือไม่ ?
        <a class="btn btn-success">Success Button</a>
        <a class="btn btn-success btn-outline">Success Button</a>
    </div>
</div>

@include('front/event/modal')

@endsection
@section('scripts')
<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();

    var remove = (function (ele, member_id) {
        
        $.ajax({
            url: '/event/{{ $event->event_id }}/member/'+ member_id,
            method: 'delete',
            success: function(data){
                $(ele).parent().parent().remove();
            }
        });
    });
</script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/hashchange.min.js"></script>
<script src="/js/event.js?v=1"></script>
@endsection
