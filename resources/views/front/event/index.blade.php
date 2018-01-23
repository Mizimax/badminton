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
                    <div style="position:relative" onclick="closeHand(this, {{ $event->event_id }}, {{$race['race_id']}}, '{{$race['race_name']}}')" class="{{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}">
                        <span class="badge badge-orange">{{$race['race_name']}}</span>
                        {{$race['max_register'] - $race['can_register']}} <b>/ {{$race['max_register']}}</b>
                    </div>
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

<div class="alert delete hide">
    <div class="overlay"></div>
    <div class="fixed middle color-white" style="z-index:1001">
        <div class="font-bigger" align="center">ท่านต้องการลบ</div>
        <br>
        <div align="center" class="delete-name font-bigger" style="color: #84BA3D"></div>
        <div class="font-bigger" align="center">หรือไม่ ?</div>
        <br>
        <div align="center">
            <a class="btn btn-success mar-side-10 delete">ลบชื่อ</a>
            <a class="btn btn-success btn-outline mar-side-10" onclick="$('.alert').fadeOut();">ย้อนกลับ</a>
        </div>
    </div>
</div>

<div class="alert alert-close hide">
    <div class="overlay"></div>
    <div class="fixed middle color-white" style="z-index:1001">
        <div class="font-bigger" align="center">หากท่านปิดรับสมัคร<br>ผู้เข้าแข่งขันจะไม่สามารถสมัครได้</div>
        <br>
        <div align="center">
            <a class="btn btn-success mar-side-10 close-btn">ยืนยัน</a>
            <a class="btn btn-success btn-outline mar-side-10" onclick="$('.alert').fadeOut();">ย้อนกลับ</a>
        </div>
    </div>
</div>

<div class="alert cancel hide">
    <div class="overlay"></div>
    <div class="fixed middle color-white" style="z-index:1001">
        <div class="font-bigger" align="center">หากท่านยกเลิกมือ<br>รายชื่อและรายการจะไม่แสดง<br>บนเว็บไซต์อีกต่อไป</div>
        <br>
        <div class="font-bigger" align="center" style="font-style: italic;color:#F15A24">ท่านต้องการยกเลิกมือ <span class="cancel-hand"></span> หรือไม่ ?</div>
        <br>
        <div align="center">
            <a class="btn btn-danger mar-side-10 cancel-btn" style="border-radius:20px; width:80px">ยืนยัน</a>
            <a class="btn btn-success btn-outline mar-side-10" onclick="$('.alert').fadeOut();">ย้อนกลับ</a>
        </div>
    </div>
</div>

<div class="alert roll hide">
    <div class="overlay"></div>
    <div class="fixed middle color-white" style="z-index:1001">
        <div class="font-bigger" align="center">หากท่านทำการ "สุ่ม" ผู้เล่นแล้ว<br>ระบบจะปิดการรับสมัครอัตโนมัติ</div>
        <br>
        <div class="font-bigger" align="center" style="font-style: italic;color:#F15A24">ท่านต้องการสุ่มใบสายผู้เข้าแข่งขันหรือไม่ ?</div>
        <br>
        <div align="center">
            <a class="btn btn-info mar-side-10 roll-btn" style="border-radius:20px; width:80px">สุ่มใบสาย</a>
            <a class="btn btn-success btn-outline mar-side-10" onclick="$('.alert').fadeOut();">ย้อนกลับ</a>
        </div>
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

    var remove = (function (ele, member) {
        $('.alert.delete').fadeIn();
        $('.delete-name').html('');
        $.each(member['name'], function(index, data){
            if(index !== 1)
                $('.delete-name').append(data['name']);
            else
                $('.delete-name').append(' + ' + data['name']);
        });
        $('.btn.delete').click(function() {
            $('.alert.delete').fadeOut();
            $.ajax({
                url: '/event/{{ $event->event_id }}/member/'+ member['id'],
                method: 'delete',
                success: function(data){
                    $(ele).parent().parent().remove();
                }
            });
        });
    });

    var race = (function (ele, member_id) {
        
        var hasDropdown = $(ele).next().length == 0;
        $('.input-dropdown.show').remove();
        if(hasDropdown) {
            $(ele).parent().append(
                `
                <div class="input-dropdown home shadow-black show">
                    @foreach ($list_race as $race)
                        <div class="item-dropdown" value="{{$race->race_id}}"><div class="item">{{$race->race_name}}</div></div>
                    @endforeach
                </div>
            `);
            $('td .item-dropdown').click(function() {
                $(this).parent().remove();
                var race = $(this).attr('value');
                $.ajax({
                    url: '/event/{{ $event->event_id }}/member/'+ member_id + '?name=race',
                    method: 'update',
                    data: {
                        'race_id': race
                    },
                    success: function(data){
                        $(ele).text(data.race_id);
                    }
                });
            });
        }
    });

    var hand = (function (ele, member_id) {
        var hasDropdown = $(ele).next().length == 0;
        $('.input-dropdown.show').remove();
        if(hasDropdown) {
            $(ele).parent().append(
                `
                <div class="input-dropdown home shadow-black show">
                        <div class="item-dropdown" value="0"><div class="item">ผ่านการประเมิน</div></div>
                        <div class="item-dropdown" value="1"><div class="item">ไม่ผ่านการประเมิน</div></div>
                </div>
            `);
            $('td .item-dropdown').click(function() {
                $(this).parent().remove();
                var hand = $(this).attr('value');
                $.ajax({
                    url: '/event/{{ $event->event_id }}/member/'+ member_id + '?name=hand',
                    method: 'update',
                    data: {
                        'hand': hand
                    },
                    success: function(data){
                        $(ele).text(data.race_id);
                    }
                });
            });
        }
    });

    var payment = (function (ele, member_id) {
        var hasDropdown = $(ele).has('.input-dropdown.show').length == 0;

        $('.input-dropdown.show').remove();
        if(hasDropdown) {
            $(ele).parent().append(
                `
                <div class="input-dropdown home shadow-black show">
                        <div class="item-dropdown" value="0"><div class="item">ชำระแล้ว</div></div>
                        <div class="item-dropdown" value="1"><div class="item">ยังไม่ชำระ</div></div>
                </div>
            `);
            $('td .item-dropdown').click(function() {
                $(this).parent().remove();
                var payment = $(this).attr('value');
                $.ajax({
                    url: '/event/{{ $event->event_id }}/member/'+ member_id + '?name=payment',
                    method: 'update',
                    data: {
                        'payment': payment
                    },
                    success: function(data){
                        $(ele).text(data.race_id);
                    }
                });
                $(this).parent().remove();
            });
        }
    });

    var closeHand = (function (ele, member_id, race_id, race_name) {
        var hasDropdown = $(ele).next().length == 0;
        $('.input-dropdown.show').remove();
        if(hasDropdown) {
            $(ele).parent().append(
                `
                <div class="input-dropdown home shadow-black show" style="width: 120px; top:30px">
                        <div class="item-dropdown item-close" value="0"><div class="item">ปิดรับสมัคร</div></div>
                        <div class="item-dropdown" value="1"><div class="item">แก้ไขจำนวนคู่</div></div>
                        <div class="item-dropdown item-cancel" value="2"><div class="item" style="color:#F15A24">ยกเลิกมือ</div></div>
                </div>
            `);
            $('.item-close').click(function() {
                $('.alert-close').fadeIn();
                $(this).parent().remove();
            });
            $('.item-cancel').click(function() {
                $('.alert.cancel').fadeIn();
                $(this).parent().remove();
                $('.cancel-hand').text(race_name);
            });
            $('.close-btn').click(function() {
                var race = $(this).attr('value');
                $.ajax({
                    url: '/event/{{ $event->event_id }}/race/'+ race_id,
                    method: 'update',
                    data: {
                        'race_list': race
                    },
                    success: function(data){
                        $(ele).text(data.race_id);
                    }
                });
                $('.alert-close').fadeOut();
            });
            $('.cancel-btn').click(function() {
                var race = $(this).attr('value');
                $.ajax({
                    url: '/event/{{ $event->event_id }}/race/'+ race_id,
                    method: 'delete',
                    success: function(data){
                        $(ele).text(data.race_id);
                    }
                });
                $('.alert.cancel').fadeOut();
            });
        }
    });
</script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/hashchange.min.js"></script>
<script src="/js/event.js?v=1"></script>
@endsection
