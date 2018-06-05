@extends('layouts.app')

@section('content')
<link href="/css/home.css?v=1" rel="stylesheet">
<link href="/css/datepicker.min.css" rel="stylesheet">
    <div class="row" style="background-color:#000; position: relative;">
            <div id="carousel-example-generic" class="carousel slide max" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($sponsors as $k=>$sponsor)
                        @if ($k==0)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$k}}" class="active"></li>
                        @else
                            <li data-target="#carousel-example-generic" data-slide-to="{{$k}}"></li>
                        @endif
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach ($sponsors as $k=>$sponsor)
                        @if ($k==0)
                            <div class="item active">
                                <img src="{{$sponsor['sponsor_image']}}" class="header">
                                    <div class="carousel-caption">
                                    </div>
                            </div>
                        @else
                            <div class="item">
                            <img src="{{$sponsor['sponsor_image']}}">
                                <div class="carousel-caption">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-12 remove-padding" style="margin: 0 auto;">

            <!-- pc -->
            <div id="filter" class="items font-med font-bold" align="center">
                <div class="item">
                    สถานะแข่งขัน <br>
                    <div class="input"><span class="display">ทุกรูปแบบ</span> <span class="icon dropdown">▼</span></div>
                    <div class="input-dropdown home shadow-black">
                        <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">ทุกรูปแบบ</div></div>
                        <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">รับสมัคร</div></div>
                        <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">ผลการแข่งขัน</div></div>
                        <div class="item-dropdown" onclick="selectDropdown(this)"><div class="item">กำลังแข่งขัน</div></div>
                    </div>
                </div>
                <div class="item">
                    วันที่แข่งขัน <br>
                    <div class="input" data-toggle="datepicker"><span class="display">วันที่ทั้งหมด</span> <span class="icon date"><span class="glyphicon glyphicon-calendar"></span></div>
                </div>
                <div class="item">
                    เลือกมือ <br>
                    <div class="input"><span class="display">อันดับมือ</span> <span class="icon dropdown">▼</span></div>
                    <div class="input-dropdown hand">
                        <div class="hand1 shadow-black">
                            <div class="item active"><div class="display">Mix</div></div>
                            <div class="item"><div class="display">Single</div></div>
                            <div class="item"><div class="display">Double</div></div>
                        </div>
                        <div class="hand2 shadow-black">
                            <div class="item"><div class="display">S</div></div>
                            <div class="item"><div class="display">P-</div></div>
                            <div class="item"><div class="display">P</div></div>
                            <div class="item"><div class="display">P+</div></div>
                            <div class="item"><div class="display">C</div></div>
                            <div class="item"><div class="display">C+</div></div>
                            <div class="item"><div class="display">B</div></div>
                            <div class="item"><div class="display">B+</div></div>
                            <div class="item"><div class="display">A</div></div>
                            <div class="item"><div class="display">VIP</div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- mobile -->
            <div id="calendar" align="center">
                <button class="button is-success font-bold font-big"><i style="margin-right: 15px" class="fa fa-table" aria-hidden="true"></i> ปฏิทินการแข่งขัน</button>
            </div>

            <div class="box-container box-margin">
                @foreach ($events as $event)
                <div class="box">
                    <div class="row padding box-image relative" align="center" style="background-image: url('{{$event['event_poster']}}')">
                    <div class="absolute box-overlay"></div>

                        <div class="remove-padding box-content">
                            <div class="row">
                                <div class="col-sm-12 remove-padding" style="margin-top: 15px">
                                    <h2 class="remove-padding white" style="color: white; font-weight: 900; font-size: 26px" >{{$event['event_title']}} <span class="font-small tag">อีก {{$event['day_left']}} วัน</span></h2>
                                    <span class="font-med" style="color: #aaa">สนามแบด: <a target="_blank" style="text-decoration: underline; color:#ccc" href="{{$event['event_description']->location->position}}"><strong>{{$event['event_description']->location->name}}</strong></a></span>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-12 remove-padding">
                                    <span class="font-med" style="color:#f11010;font-weight: bold">{{$event['event_description']->date}}</span>
                                    @if($event['day_left_text'] > 0)
                                        <span class='label label-white'>เหลืออีก  {{$event['day_left']}} วัน</span>
                                    @else
                                        <span class='label label-default'>รายการเสร็จสิ้น</span>
                                    @endif<br>

                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-12 remove-padding">
                                @foreach($event['event_race'] as $race)
                                    @if($race->can_register > 0 && $race->status == 0)
                                    <span class="badge badge-white">
                                    @else
                                    <span class="badge badge-orange">
                                    @endif
                                    {{$race['race_name']}}</span>
                                @endforeach

                                </div>

                            </div>
                            <div class="row" id="detail-btn">
                              <div class="col-sm-6"><span class="font-small" style="color:#aaa">ผู้จัด: </span><span class="font-small" style="text-decoration: underline; color:#ccc">{{$event['event_description']->by}}</span><br>
                              <span class="font-bold" style="color:orange; font-size: 13px">{{$event['event_description']->date}}</span>
                            </div>
                              <div class="col-sm-6 pull-down" align="right">
                                  <a type="button" href="/event/{{$event['event_id']}}" class="btn-detail" style="width: 100px" >รายละเอียด</a>
                                  @if( $event['event_status'] == 1)
                                  <button type="button" onClick="set_event({{$event['event_id']}})" class="button is-info btn btn-slim btn-outline-primary" style="width: 100px" data-toggle="modal" data-target="#register_event_modal">สมัครการแข่ง</button>
                                  @else
                                  <button type="button" class="btn btn-brown btn-slim" style="width:100px" onclick="window.location='/event/{{$event['event_id']}}#/match'">ผลการแข่ง</button>
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div id="modal-home">
    <div class="modal fade" id="register_event_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/home.js?v=1"></script>
    <script src="/js/datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true
            });
        });
    </script>
    <script type='text/javascript'>
    window.__lo_site_id = 114394;

    	(function() {
    		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
    		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
    	  })();
    	</script>
@endsection
