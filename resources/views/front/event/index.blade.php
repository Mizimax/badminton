@extends('layouts.app')
@section('content')
<link href="/css/event.css?v=4" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="/css/jquery.dataTables.min.css">
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
        @if($event->event_id == 22)
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
        @if($event->member_status === 0 || ($event->event_user_id === Auth::id() || isAdmin()))
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
                        <span class="badge {{ ($race['can_register'] <= 0 || $race->status == 1) ? 'badge-orange' : 'badge-white' }}">{{$race['race_name']}}</span>
                        <span class="hand-status">
                        @if(isset($race->status))
                            @if($race->status == 1)
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
        @endif
            @include('front/event/member')
        </div>
        <div role="tabpanel" class="tab-pane" id="match">

            @include('front/event/match')
        </div>
        <div role="tabpanel" class="tab-pane relative" id="picture" style="min-height: 200px;">
        @if(isset($event_image) && count($event_image) > 0)
            <div class="flex wrap" align="center" style="margin-top:20px">
            @foreach($event_image as $image)
                <div class="{{ count($event_image) == 1 ? 'col-sm-4 div center': 'col-md-4 col-sm-6 col-xs-12'}}" style="margin-top:20px">
                    <img style="width:100%" src="{{ $image }}">
                </div>
            @endforeach
            </div>
        @else
            <div class="absolute middle">ยังไม่มีรูปภาพ</div>
        @endif
        </div>
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

<div class="alert comment hide">
    <div class="overlay"></div>
    <div class="fixed middle color-white">
        <div class="font-bigger" align="center">โปรดกรอกเหตุผลที่ไม่ผ่านการประเมิน</div>
        <br>
        <div align="center">
        <input type="text" class="comment_input">
        </div>
        <br>
        <div align="center">
            <a class="btn btn-danger mar-side-10 comment-btn" style="border-radius:20px; width:80px">ยืนยัน</a>
            <a class="btn btn-success btn-outline mar-side-10" onclick="$('.alert').fadeOut();">ปิด</a>
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
@if($line_type === 1)
<script src="/js/drag.js"></script>
@endif
<script type="text/javascript">

    var handSortList = [
      @foreach($list_race as $race)
        {{$race->race_id}},
      @endforeach
    ];

    $(document).on('click', '.dropdown.all .dropdown-menu', function (e) {
      e.stopPropagation();
    });

    $(document).on('click', '.has-dropdown', function(e) { 
      e.stopPropagation();
      $(this).children(':first').children(':first').dropdown('toggle'); 
    });

    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }

        if (location.hash === '#register') {
            $('#register_event_modal').modal();
        }

        @if($line_type === 1)
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
                var i,j,x,count=0,temp = [],chunk = 4;
                var array = Array.from(boxes);
                for (i=0,j=array.length; i<j; i+=chunk) {


                    for(x=i; x<i+chunk;x++) {
                        if(!temp[count])
                            temp[count] = []
                        temp[count].push(parseInt($(array[x]).children(':first').attr('team-id')));
                    }
                    count++;
                }

                // boxes.forEach(function(ele) {
                //     race_id = $(ele).children(':first').attr('race-id');
                //     team_id = $(ele).children(':first').attr('team-id');
                //     line = $(ele).children(':first').attr('line');
                //     $(ele).children(':first').attr('line', line);
                //     console.log(team_id);
                //     if(!lineChanged[race_id]){
                //         lineChanged[race_id] = {}
                //         lineChanged[race_id][line] = [];
                //     }
                //     if(!lineChanged[race_id][line]) {
                //         lineChanged[race_id][line] = [];
                //     }
                //     if(line !== latestLine){
                //         lineChanged[race_id][line] = [];
                //     }
                //     lineChanged[race_id][line].push(parseInt(team_id));
                //     latestLine = line;
                // })
                $.ajax({
                    url: '/split_line/{{ $event->event_id }}/race/'+$('#hand_dropdown').val(),
                    method: 'patch',
                    data: JSON.stringify(temp),
                    success: function(data){
                        search_match($('#hand_dropdown').val());
                    }
                });
            }
        });
        @endif
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
            @if($line_type === 0)
            $('.nav-bottom').css('top', '100px');
            @else
            $('.nav-bottom').css('bottom', '50px');
            @endif
        } else {
            $('.nav-manage .manager').css('position', 'absolute');
            $('.nav-manage .manager-right').css('position', 'absolute');
            $('.nav-manage .manager').css('top', '1000px');
            $('.nav-manage .manager-right').css('top', '1000px');
            $('.nav-bottom').css('position', 'absolute');
            @if($line_type === 0)
            $('.nav-bottom').css('top', '50px');
            @else
            $('.nav-bottom').css('bottom', '-200px');
            @endif
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
                        <div class="item-dropdown" value="1"><div class="item">รอการประเมิน</div></div>
                </div>
            `);
            $('td .item-dropdown').click(function() {
                $(this).parent().remove();
                var status = $(this).attr('value');
                var statusName = $(this).children(':first').text();
                if(statusName == 'ไม่ผ่านการประเมิน')
                  comment(member_id)
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
                        <div class="item-dropdown" onclick="editHandCap(${race_id}, this)" value="1"><div class="item">แก้ไขจำนวนคู่</div></div>
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
                            $(ele).children().eq(1).html(data['registered'] + ' <b>/ '+ data['max_register'] +'</b>');
                        }
                        else{
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

    handSort = (function(ele) {
        var button = $(ele).parents(".dropdown-menu").prev();
        var text = $(ele).text().trim();
        var value = $(ele).attr('value');
        button.text(text);
        handSortList[button.attr('key')] = parseInt(value);
    });

    handSortAll = (function(ele) {
        var button = $(ele).parents(".dropdown-menu").prev();
        var current = button.text();
        var text = $(ele).text().trim();
        var value = $(ele).attr('value');
        var prev = $(ele).parents(".dropdownza").children();
        prev = prev.filter(index=>{
          return prev[index].innerText.trim() === text }
        );
        $(prev).children(':first').html('&nbsp&nbsp'+current+' &nbsp<span class="glyphicon glyphicon-menu-down"></span></button>');
        button.html('&nbsp&nbsp'+text+' &nbsp<span class="glyphicon glyphicon-menu-down"></span></button>');
        handSortList[$(prev).children(':first').attr('key')] = handSortList[button.attr('key')];
        handSortList[button.attr('key')] = parseInt(value);
    });

    handSortGroup = (function(ele) {
      $(ele).parents(".dropdown.all").toggleClass('open');
        var button = $(ele).parents(".dropdown-menu").prev();
        var current = button.html();
        var text = $(ele).text().trim();
        var value = $(ele).attr('value');
        var race = $(ele).attr('race');
        var prev = $(ele).parents(".allTable").children(':first').children();
        var match = $(ele).parents(".dropdown.all").attr('match')
        var time_from = $(ele).parents(".dropdown.all").attr('time')
        var count = $(ele).parents(".dropdown.all").attr('count')
        var prevMatch, prevCount, time_to;

        prev = prev.filter(index=>{
          return $(prev[index]).find('.dropdown.all').children(':first').text().trim() === race+'รอบ '+text }
        );
        if(prev.length == 0){
          var prevNext
          if($(ele).parents(".allTable").attr('id') === 'table_2')
            prevNext = $(ele).parents(".allTable").prev().children(':first').children();
          else
            prevNext = $(ele).parents(".allTable").next().children(':first').children();
          prevNext = prevNext.filter(index=>{
            return $(prevNext[index]).find('.dropdown.all').children(':first').text().trim() === race+'รอบ '+text
          });
          $(prevNext[0]).find('.dropdown.all').children(':first').html(current);
          prevMatch = $(prevNext[0]).find('.dropdown.all').attr('match')
          prevCount = $(prevNext[0]).find('.dropdown.all').attr('count')
          time_to = $(prevNext[0]).find('.dropdown.all').attr('time')
        }
        else{
          $(prev).find('.dropdown.all').children(':first').html(current);
          prevMatch = $(prev[0]).find('.dropdown.all').attr('match')
          prevCount = $(prev[0]).find('.dropdown.all').attr('count')
          time_to = $(prev[0]).find('.dropdown.all').attr('time')
        }     
        button.html('<span class="font-bold font-bigger">'+race+'</span><br>รอบ '+value+'<br><span class="glyphicon glyphicon-menu-down"></span></button>');
        var res = {};
        var from = [], to = [];
        for(var i = 0; i < count; i++)
          from.push(parseInt(match)+i)
        for(var i = 0; i < prevCount; i++)
          to.push(parseInt(prevMatch)+i)
        if(from[0] > to[0]){
          res['from'] = to;
          res['to'] = from;
          res['time_from'] = time_to;
          res['time_to'] = time_from;
        }
        else{
          res['from'] = from;
          res['to'] = to;
          res['time_from'] = time_from;
          res['time_to'] = time_to;
        }
        
        swal({
            title: "โปรดรอสักครู่...",
            html: "<br><div class='lds-dual-ring'></div><br>กำลังจัดสายการแข่งขัน",
            showConfirmButton: false
        });
        $.ajax({
                  url: '/all/{{ $event->event_id }}',
                  method: 'post',
                  data: JSON.stringify(res),
                  success: function(data){
                    getMatch({{ $event->event_id }}, function(){
                      swal.close();
                    });
                  },
                  error: function() {
                      swal('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
                  }
        });
    });

    var judsaiAll = (function(court) {
      swal({
            title: "โปรดรอสักครู่...",
            html: "<br><div class='lds-dual-ring'></div><br>กำลังจัดสายการแข่งขัน",
            showConfirmButton: false
      });
      $.ajax({
                  url: '/court/{{ $event->event_id }}/'+court,
                  method: 'post',
                  data: JSON.stringify(handSortList),
                  success: function(data){
                      swal({
                          title: "สำเร็จ !",
                          text: "จัดสายการแข่งขันเรียบร้อย โปรดยืนยันการจัดสายในภายหลัง"
                      }).then(function(){
                          window.location = '/event/{{ $event->event_id }}#/match';
                          location.reload();
                      })
                  },
                  error: function() {
                      swal('กรุณาใส่ข้อมูลให้ครบถ้วน');
                  }
      });

    })

    var judsai = (function() {
        swal({
            title: "เรียงลำดับการแข่งขันแต่ละมือ",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "ยืนยัน",
            closeOnConfirm: false,
            html: `
            <div id="handSort" class="flex wrap flex-center">
            @foreach($list_race as $key=> $races)
                <div class="dropdown {{ ($key == 0) ? 'open':'ss' }}">
                    <button key="{{$key}}" class="btn btn-default dropdown-toggle handLabel" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{$key+1}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <div class="flex pad-side-10">
                        @foreach($list_race as $race)
                            <div class="handLabel small" onclick="handSort(this)" value="{{$race->race_id}}">
                                <div class="absolute middle">
                                {{$race['race_name']}}
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </ul>
                </div>
            @endforeach
            </div>
            `
        }).then(function(isConfirm){
            if(isConfirm.value){
                swal({
                    title: "โปรดรอสักครู่...",
                    html: "<br><div class='lds-dual-ring'></div><br>กำลังจัดสายการแข่งขัน",
                    showConfirmButton: false
                });
                $.ajax({
                            url: '/random/{{ $event->event_id }}',
                            method: 'post',
                            data: JSON.stringify(handSortList),
                            success: function(data){
                                swal({
                                    title: "สำเร็จ !",
                                    text: "จัดสายการแข่งขันเรียบร้อย โปรดยืนยันการจัดสายในภายหลัง"
                                }).then(function(){
                                    window.location = '/event/{{ $event->event_id }}#/match';
                                    location.reload();
                                })
                            },
                            error: function() {
                                swal('กรุณาใส่ข้อมูลให้ครบถ้วน');
                            }
                });
            }
        });
    });

    var judsaiEiei = (function() {
        swal({
            title: "โปรดรอสักครู่...",
            html: "<br><div class='lds-dual-ring'></div><br>กำลังจัดสายการแข่งขัน",
            showConfirmButton: false
        });
        $.ajax({
            url: '/split_line/{{ $event->event_id }}/race/'+$('#hand_dropdown').val()+'/shuffle',
            method: 'get',
            success: function(data){
                search_match($('#hand_dropdown').val());
                getMatch({{ $event->event_id }});
                swal({
                    title: "สำเร็จ !",
                    text: "จัดสายการแข่งขันเรียบร้อย โปรดยืนยันการจัดสายในภายหลัง"
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
                location.reload();
            }
        });
    });

    var editHandCap = (function(race_id, ele) {
        var element = $(ele).parent().prev().find('.hand-status b');
        var capacity = element.text();
        var cap = capacity.slice(2,capacity.length);
        swal({
            title: 'แก้ไขจำนวนผู้สมัคร',
            html:
                '<input id="swal-input1" class="swal2-input" placeholder="'+cap+'">',
            preConfirm: function () {
                return new Promise(function (resolve) {
                resolve(
                    $('#swal-input1').val()
                )
                })
            },
            onOpen: function () {
                $('#swal-input1').focus()
            }
        }).then(function (result) {
            var data = (result.value === true) ? '': result.value;
            if(data){
                $.ajax({
                    url: '/event/{{ $event->event_id }}/race/'+race_id+'/count',
                    method: 'patch',
                    data: JSON.stringify({
                        handCount: data
                    }),
                    success: function(data){
                        element.text('/ ' + data.count);
                    }
                });
            }
        }).catch(swal.noop)

    });

    var editTime = (function(match_no, ele) {
        var time = $(ele).find('.font-big').text();
        swal({
            title: 'แก้ไขเวลา',
            html:
                '<input id="swal-input2" class="swal2-input" value="" placeholder="'+time+'">',
            preConfirm: function () {
                return new Promise(function (resolve) {
                resolve(
                    $('#swal-input2').val()
                )
                })
            },
            onOpen: function () {
                $('#swal-input2').focus()
            }
        }).then(function (result) {
            var data = (result.value === true) ? '': result.value;
            if(data){
                $.ajax({
                    url: '/event/{{ $event->event_id }}/match/'+match_no+'/time',
                    method: 'patch',
                    data: JSON.stringify({
                        time: data
                    }),
                    success: function(result_data){
                        search_match($('#hand_dropdown').val());
                    },
                    error: function(result) {
                        var error = result.responseJSON;
                        swal(error['message']);
                    }
                });
            }
        }).catch(swal.noop)

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

    var desc = (function(id) {
      $.ajax({
            url: '/event/{{ $event->event_id }}/member/'+id,
            method: 'get',
            success: function(data){
                $('body').append(data);
                $('#event_modal_desc').modal();
            }
        });
    })

    var hideName = (function() {
      $.ajax({
          url: '/event/{{ $event->event_id }}/member/hide',
          method: 'patch',
          success: function(result_data){
            swal(result_data['message']);
          },
          error: function(result) {
              var error = result.responseJSON;
              swal(error['message']);
          }
      });
    })

    var comment = (function(id) {

      $('.alert.comment').fadeIn();
      $('.comment-btn').bind( "click", function() {
        $.ajax({
            url: '/event/{{ $event->event_id }}/member/'+ id +'/comment',
            method: 'patch',
            data: JSON.stringify({
              comment: $('.comment_input').val()
            }),
            success: function(result_data){
              swal(result_data['message']);
            },
            error: function(result) {
                var error = result.responseJSON;
                swal(error['message']);
            }
        });
        $('.comment-btn').unbind("click");
        $('.alert.comment').fadeOut();
      });
    })

</script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/hashchange.min.js"></script>
<script src="/js/event.js?v=5"></script>
<script type='text/javascript'>
window.__lo_site_id = 114394;

	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
	</script>

@endsection
