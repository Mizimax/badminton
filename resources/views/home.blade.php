@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <div class="row" style="background-color:#000; position: relative;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 remove-padding" style="margin: 0 auto;">

            <!-- pc -->
            <div id="filter" class="items font-med font-bold" align="center">
                <div class="item">
                    สถานะแข่งขัน <br>
                    <button class="input"><span class="display">ทุกรูปแบบ</span> <span class="icon dropdown">▼</span></button>
                </div>
                <div class="item">
                    วันที่แข่งขัน <br>
                    <button class="input"><span class="display">วันที่ทั้งหมด</span> <span class="icon date"><span class="glyphicon glyphicon-calendar"></span></button>
                </div>
                <div class="item">
                    เลือกมือ <br>
                    <button class="input"><span class="display">อันดับมือ</span> <span class="icon dropdown">▼</span></button>
                </div>
            </div>

            <!-- mobile -->
            <div id="calendar" align="center">
                <button class="button is-success font-bold font-big"><i style="margin-right: 15px" class="fa fa-table" aria-hidden="true"></i> ปฏิทินการแข่งขัน</button>
            </div>

            <div class="box-container">
                @foreach ($events as $event)
                <div class="box">
                    <div class="row padding" align="center">
                        <div class="col-sm-6 col-xs-12 padding-side" style="vertical-align: middle;">
                        <img src="{{$event['event_poster']}}" class="img-responsive img-center" style="width: 100%;max-height:270px;">
                        </div>
                        <div class="col-sm-6 col-xs-12 remove-padding">
                            <div class="row">
                                <div class="col-sm-12 remove-padding" style="margin-top: 15px">
                                    <h2 class="remove-padding" style="color: black; font-weight: 900; font-size: 26px">{{$event['event_title']}}</h2>
                                    <span class="font-small">ผู้จัด: </span><span class="font-small" style="text-decoration: underline; color:black">{{$event['event_description']->by}}</span>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 remove-padding">
                                    <span class="font-med" style="color:#f11010;font-weight: bold">{{$event['event_description']->date}}</span>
                                    @if($event['day_left_text'] > 0)
                                        <span class='label label-white'>เหลืออีก  {{$event['day_left']}} วัน</span>
                                    @else
                                        <span class='label label-default'>รายการเสร็จสิ้น</span>
                                    @endif<br>
                                    <span class="font-med">สนามแบด: <a target="_blank" href="{{$event['event_description']->location->position}}"><strong>{{$event['event_description']->location->name}}</strong></a></span><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 remove-padding" style="padding-bottom:10px;">
                                @foreach($event['event_race'] as $race)
                                    @if($race->can_register > 0)
                                    <span class="badge badge-white">
                                    @else
                                    <span class="badge badge-orange">
                                    @endif
                                    {{$race['race_name']}}</span>
                                @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-11 text-right  remove-padding notop">
                                    <a type="button" href="/event_detail/{{$event['event_id']}}" class="btn btn-white-blue btn-slim margin-bottom">รายละเอียด</a>
                                    @if( $event['event_status'] == 1)
                                    <button type="button" onClick="set_event({{$event['event_id']}})" class="button is-info btn btn-slim margin-bottom" style="width: 120px" data-toggle="modal" data-target="#register_event_modal">สมัครการแข่ง</button>
                                    @else
                                    <button type="button" class="btn btn-brown btn-slim">ผลการแข่ง</button>
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
    <div class="row">
    <div class="col-sm-12" style="height:10px"> </div>
    </div>
    <div id="modal-home">
    <div class="modal fade" id="register_event_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    </div>
    </div>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
