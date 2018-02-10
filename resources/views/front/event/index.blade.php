@extends('layouts.app')
@section('content')
<link href="/css/event.css?v=1" rel="stylesheet">
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

    <div class="col-md-12 tab-content" style="position:initial">
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
        
                    <div class="input" style="margin:0 auto;max-width: 100%; width: 170px;transform: translateY(-10%); font-size: 15px">
                        <span class="display" style="text-align: center">เลือกอันดับ</span> <span class="icon dropdown">▼</span>
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
                    <div style="position:relative"
                    @if($event->event_user_id === Auth::id() || isAdmin())
                    onclick="closeHand(this, {{ $event->event_id }}, {{$race['race_id']}}, '{{$race['race_name']}}')"
                    @endif
                    class="{{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}">
                        <span class="badge badge-orange">{{$race['race_name']}}</span>
                        <span class="hand-status">
                        @if(isset($race->status))
                            @if($race->status === 1)
                                <b>ปิดรับสมัครแล้ว</b>
                            @else
                                {{$race['max_register'] - $race['can_register']}} <b>/ {{$race['max_register']}}</b>
                            @endif
                        @else
                        {{$race['max_register'] - $race['can_register']}} <b>/ {{$race['max_register']}}</b>
                        @endif
                        </span>
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
    <div class="fixed middle color-white">
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
    <div class="fixed middle color-white">
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
    <div class="fixed middle color-white">
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
    <div class="fixed middle color-white">
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

<div class="alert menu hide">
    <div class="overlay" style="z-index:1000" onclick="menuToggle(this);$(this).parent().fadeOut('fast')"></div>
</div>

@include('front/event/modal')

@endsection
@section('scripts')
<script src="/js/drag.js"></script>
<script type="text/javascript">

    var lineChanged = {};

    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
        var dragAndSwap = new DragAndSwap({
            containers: ['#table-match'],
            element: '.team_mem',
            isEnabled: true,
            swapBetweenContainers: true,
            onChange: function (boxes) {
                var latestLine;
                var race_id;
                var team_id;
                var line;
                boxes.forEach(function(ele) {
                    race_id = $(ele).children(':first').attr('race-id');
                    team_id = $(ele).children(':first').attr('team-id');
                    line = $(ele).children(':first').attr('line');

                    if(!lineChanged[race_id]){
                        lineChanged[race_id] = {}
                        lineChanged[race_id][line] = [];
                    }
                    if(!lineChanged[race_id][line]) {
                        lineChanged[race_id][line] = [];
                    }
                    if(line !== latestLine){
                        lineChanged[race_id][line] = [];
                    }
                    lineChanged[race_id][line].push(parseInt(team_id));
                    latestLine = line;
                })
            }
        });
    })();
    /*
    * Replace all SVG images with inline SVG
    */

    var navTop = $('.tab-content').offset().top;

    $(window).scroll(function(){
        navTop = $('.tab-content').offset().top;
        if ($(this).scrollTop() >= navTop) {
            $('.nav-manage .manager').css('position', 'fixed');
            $('.nav-manage .manager-right').css('position', 'fixed');
            $('.nav-manage .manager-right').css('right', '33px');
            $('.nav-manage .manager').css('left', '33px');
            $('.nav-manage .manager').css('top', '70px');
            $('.nav-manage .manager-right').css('top', '50px');
            $('.nav-bottom').css('position', 'fixed');
            $('.nav-bottom').css('bottom', '50px');
        } else {
            $('.nav-manage .manager').css('position', 'absolute');
            $('.nav-manage .manager-right').css('position', 'absolute');
            $('.nav-manage .manager').css('top', '1000px');
            $('.nav-manage .manager-right').css('top', '1000px');
            $('.nav-bottom').css('position', 'absolute');
            $('.nav-bottom').css('bottom', '-200px');
        }
    });
	
    jQuery('img.svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });

    var menuToggle = (function(ele) {
        var active = $('.nav-manage-mobile .active');
        if(active.length !== 0 && !$(ele).is(active)) {
            active.children().eq(1).fadeOut('fast', function(){
                active.children().eq(0).fadeIn('fast');
            });
            active.prev().slideUp('fast');
            active.removeClass('active');
        }
        if($(ele).hasClass('active')){
            $('.alert.menu').fadeOut();
            $(ele).children().eq(1).fadeOut('fast', function(){
                $(ele).children().eq(0).fadeIn('fast');
            });
            $(ele).prev().slideUp('fast');
        }
        else{
            $('.alert.menu').fadeIn();
            $(ele).children().eq(0).fadeOut('fast', function(){
                $(ele).children().eq(1).fadeIn('fast');
            });
            $(ele).prev().slideDown('fast');
        }
        $(ele).toggleClass('active');
        
    });

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
                    url: '/event/{{ $event->event_id }}/member/'+ member_id + '/hand',
                    method: 'patch',
                    data: JSON.stringify({
                        'race_id': race
                    }),
                    dataType: 'json',
                    contentType:"application/json; charset=utf-8",
                    success: function(data){
                        $(ele).text(data.race_id);
                        $(ele).css('background-color', data.race_color)
                        // swalContent = {
                        //     title: 'สำเร็จ',
                        //     text: 'เปลี่ยนเป็นมือ ' + data.race_id + ' เรียบร้อย',
                        //     type: 'success'
                        // }
                        // swal(swalContent);
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
                        <div class="item-dropdown" value="2"><div class="item">ผ่านการประเมิน</div></div>
                        <div class="item-dropdown" value="3"><div class="item">ไม่ผ่านการประเมิน</div></div>
                </div>
            `);
            $('td .item-dropdown').click(function() {
                $(this).parent().remove();
                var status = $(this).attr('value');
                var statusName = $(this).children(':first').text();
                $.ajax({
                    url: '/event/{{ $event->event_id }}/member/'+ member_id + '/status',
                    method: 'patch',
                    data: JSON.stringify({
                        'status': status
                    }),
                    dataType: 'json',
                    contentType:"application/json; charset=utf-8",
                    success: function(data){
                        $(ele).text(statusName);
                        if(status == 2) {
                            $(ele).css('background-color', '#7fe18e');
                        }else {
                            $(ele).css('background-color', '#FF2b06');
                        }
                    }
                });
            });
        }
    });

    var payment = (function (ele, member_id) {
        var hasDropdown = $(ele).next().length == 0;

        $('.input-dropdown.show').remove();
        if(hasDropdown) {
            $(ele).parent().append(
                `
                <div class="input-dropdown home shadow-black show">
                        <div class="item-dropdown" value="1"><div class="item">ชำระแล้ว</div></div>
                        <div class="item-dropdown" value="0"><div class="item">ยังไม่ชำระ</div></div>
                </div>
            `);
            $('td .item-dropdown').click(function() {
                $(this).parent().remove();
                var payment = $(this).attr('value');
                $.ajax({
                    url: '/event/{{ $event->event_id }}/member/'+ member_id + '/payment',
                    method: 'patch',
                    data: JSON.stringify({
                        'payment': payment
                    }),
                    dataType: 'json',
                    contentType:"application/json; charset=utf-8",
                    success: function(data){
                        console.dir(ele);
                        if($(ele).children(':first').length == 0) {
                            $(ele).append(
                                `
                                <span class="glyphicon glyphicon-ok-sign" style="color:#d9e047; font-size: 15px"></span>
                                `
                            )
                        }
                        else {
                            $(ele).children(':first').remove();
                        }
                    }
                });
                $(this).parent().remove();
            });
        }
    });

    var raceTemp = {};

    var closeHand = (function (ele, member_id, race_id, race_name) {
        var hasDropdown = $(ele).next().length == 0;
        $('.input-dropdown.show').remove();
        if(hasDropdown) {
            var textReg = 'ปิดรับสมัคร';
            if($(ele).children().eq(1).html().trim() == '<b>ปิดรับสมัครแล้ว</b>'){
                $('.alert-close .font-bigger').html('หากท่านเปิดรับสมัคร<br>ผู้เข้าแข่งขันจะสามารถสมัครแข่งขันได้');
                textReg = 'เปิดรับสมัคร';
            }
            $(ele).parent().append(
                `
                <div class="input-dropdown home shadow-black show" style="width: 120px; top:30px">
                        <div class="item-dropdown item-close" value="0"><div class="item">${textReg}</div></div>
                        <div class="item-dropdown" value="1"><div class="item">แก้ไขจำนวนคู่</div></div>
                        <div class="item-dropdown item-cancel" value="2"><div class="item" style="color:#F15A24">ยกเลิกมือ</div></div>
                </div>
            `);
            $('.item-close').bind( "click", function() {
                $('.alert-close').fadeIn();
                $(this).parent().remove();
                
            });
            $('.item-cancel').bind( "click", function() {
                $('.alert.cancel').fadeIn();
                $(this).parent().remove();
                $('.cancel-hand').text(race_name);
                
            });
            $('.close-btn').bind( "click", function() {
                $.ajax({
                    url: '/event/{{ $event->event_id }}/race',
                    method: 'patch',
                    data: JSON.stringify({
                        'race_id': race_id
                    }),
                    dataType: 'json',
                    contentType:"application/json; charset=utf-8",
                    success: function(data){
                        var dataEiei = $(ele).children().eq(1).html().trim();
                        if(dataEiei == '<b>ปิดรับสมัครแล้ว</b>'){
                            $(ele).children().eq(1).html(raceTemp[race_id]);
                        }
                        else{
                            raceTemp[race_id] = dataEiei;
                            $(ele).children().eq(1).html('<b>ปิดรับสมัครแล้ว</b>');
                        }
                            
                    }
                });
                $('.alert-close').fadeOut();
                $('.cancel-btn').unbind("click");
                $('.close-btn').unbind("click");
            });
            $('.cancel-btn').bind( "click", function() {
                $.ajax({
                    url: '/event/{{ $event->event_id }}/race/remove',
                    method: 'patch',
                    data: JSON.stringify({
                        'race_id': race_id
                    }),
                    success: function(data){
                        
                        $(ele).parent().remove();
                        
                        var filterOut = $('#table-member tr').filter(function(index, element){
                            return $(element).children().eq(3).children(':first').text().trim() === race_name;
                        });
                                    
                        tb_member
                            .rows(filterOut)
                            .remove()
                            .draw();
                    }
                });
                $('.alert.cancel').fadeOut();
                $('.cancel-btn').unbind("click");
                $('.close-btn').unbind("click");
            });
        }
    });

    var judsai = (function() {
        swal({
            title: "โปรดรอสักครู่...",
            html: "<br><div class='lds-dual-ring'></div><br>กำลังจัดสายการแข่งขัน",
            showConfirmButton: false
        });
        $.ajax({
                    url: '/split_line/{{ $event->event_id }}',
                    method: 'get',
                    success: function(data){
                        lineChanged = {};
                        swal({
                            title: "สำเร็จ !",
                            text: "จัดสายการแข่งขันเรียบร้อย โปรดยืนยันการจัดสายในภายหลัง"
                        }).then(function(){
                            window.location = '/event/{{ $event->event_id }}#/match';
                            search_match({{ $list_race[0]->race_id }});
                        })
                    }
        });
    });

    var judsaiConfirm = (function() {
        swal({
            title: "โปรดรอสักครู่...",
            html: "<br><div class='lds-dual-ring'></div><br>กำลังยืนยันการจัดสาย",
            showConfirmButton: false
        });
        $.ajax({
            url: '/confirm/{{ $event->event_id }}',
            method: 'post',
            data: JSON.stringify(lineChanged),
            success: function(data){
                swal({
                    title: "สำเร็จ !",
                    text: "ยืนยันการจัดสายเรียบร้อยแล้ว"
                });
                search_match($('#hand_dropdown').val());    
            }
        });
    });

    var editScore = (function(match_no) {
        // swal({
        //     title: "โปรดรอสักครู่...",
        //     html: "<br><div class='lds-dual-ring'></div><br>ค้นหา Match",
        //     showConfirmButton: false
        // });
        $.ajax({
            url: '/search_match/{{ $event->event_id }}/'+match_no,
            method: 'get',
            success: function(data){
                swal({
                    title: "แก้ไขคะแนนแมทซ์ที่ "+ match_no,
                    html: '<form id="editForm" onsubmit="editScoreSubmit('+match_no+', this);return false;"><input type="hidden" name="match" value="'+match_no+'">'+data+'</form>',
                    showConfirmButton: false
                });
            }
        });
    });

    var editScoreSubmit = (function(match_no, ele) {
        $.ajax({
            url: '/edit_score/{{ $event->event_id }}',
            method: 'post',
            data: $('#editForm').serialize(),
            success: function(data){
                swal({
                    title: "แก้ไขคะแนนแมทซ์ที่ "+ match_no,
                    text: 'แก้ไขเรียบร้อยแล้ว'
                });
                
                search_match($('#hand_dropdown').val());
            }
        });
    });
</script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/hashchange.min.js"></script>
<script src="/js/event.js?v=1"></script>
@endsection
