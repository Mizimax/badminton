@extends('layouts.app')

@section('content')
<link href="{{ asset('css/event.css') }}" rel="stylesheet">
<div class="row cover">
    <div class="col-md-3"></div>
    <div class="col-md-6">
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
                        <img src="{{$cover}}">
                            <div class="carousel-caption">
                            </div>
                    </div>
                @else
                    <div class="item">
                    <img src="{{$cover}}">
                        <div class="carousel-caption">
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 body-content">
        <div class="row">
            <div class="col-md-12" align="center">
                <h1>{{$event->event_title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" align="center">
                <button type="button" class="btn btn-lg btn-red">สมัครแข่งขัน</button>
            </div>
        </div>
        <div class="row" style="height:20px;">
            <div class="col-md-12" align="center"></div>
        </div>    
        <div class="row">
            <div class="col-xs-12" align="center">
                <button type="button" class="btn btn-tab active">
                    <img src="/images/events/detail.png" height="30"style="margin-bottom:10px;"><br>
                    รายละเอียด
                </button>
                <button type="button" class="btn btn-tab">
                <img src="/images/events/list-player.png" height="30"style="margin-bottom:10px;"><br>
                    รายชื่อผู้แข่งขัน
                </button>
                <button type="button" class="btn btn-tab">
                <img src="/images/events/match.png" height="30"style="margin-bottom:10px;"><br>
                    สายและการแข่งขัน
                </button>
                <button type="button" class="btn btn-tab">
                <img src="/images/events/picture.png" height="30"style="margin-bottom:10px;"><br>
                    รูปภาพ
                </button>
            </div>
        </div>
        <div class="row" style="height:20px;">
            <div class="col-md-12" align="center"></div>
        </div>    
        <div class="row">
            <div class="col-md-12 description">
                <span class="glyphicon glyphicon-map-marker" style="color:#ee5b36"></span>
                <a target="_blank" href="{{$event_description->location->position}}"> 
                    <strong>{{$event_description->location->name}}</strong>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <span class="glyphicon glyphicon-calendar" style="color:#43abe2"></span>
                {{$event_description->date}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <span class="glyphicon glyphicon-certificate" style="color:#d9e047"></span>
                <strong>{{$event_description->expenses}}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <strong>Rank</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <div class="row square-empty">
                    <div class="col-md-12" align="center">
                        <span style="color:#d0c0ad" align="center"><strong>การโอนเงิน</strong></span>
                    </div>
                    <div class="col-xs-6">
                        ชื่อบัญชี: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->name}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        เลขที่บัญชี: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->account}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        หรือ PromptPay: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->prompypay}}<br>
                        </strong>
                    </div>
                    <div class="col-xs-6">
                        ธนาคาร: <br>
                    </div>
                    <div class="col-xs-6">
                        <strong>
                            {{$event_description->bookbank_organizers->bank}}<br>
                        </strong>
                    </div>         
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">วัตถุประสงค์</span><br>    
                @foreach($event_description->objective as $objective)
                <p class="detail-content">
                    
                    {{$objective}}<br>
                    
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">{{$event_description->event_type->type}}</span><br>    
                @foreach($event_description->event_type->detail as $detail)
                <p class="detail-content">
                    
                    {{$detail}}<br>
                    
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ระยะเวลาในการสมัคร</span><br>    
                @foreach($event_description->detail as $detail)
                <p class="detail-content">
                    {{$detail}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">รางวัลการแข่งขัน</span>
                @foreach($event_description->rewards as $reward)
                <p class="detail-content">
                    {{$reward}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head-special">รางวัลพิเศษ</span>
                @foreach($event_description->special_rewards as $reward)
                <p class="detail-content">
                    {{$reward}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">กติกาการแข่งขัน</span>
                @foreach($event_description->rule as $rule)
                <p class="detail-content">
                    {{$rule}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">การพิจารณามือนักกีฬา</span>
                @foreach($event_description->consideration as $consideration)
                <p class="detail-content">
                    {{$consideration}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ลูกแบตที่ใช้ในการแข่ง</span>
                @foreach($event_description->accessory as $accessory)
                <p class="detail-content">
                    {{$accessory}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ประเมินมือ</span>
                @foreach($event_description->screening_person as $screening_person)
                <p class="detail-content">
                    {{$screening_person}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 description">
                <span class="square-head">ค่าใช้จ่าย</span>
                @foreach($event_description->expenses_detail as $expenses_detail)
                <p class="detail-content">
                    {{$expenses_detail}}<br>
                </p>
                @endforeach
                @foreach($event_description->postscript as $postscript)
                <p class="detail-content">
                    {{$postscript}}<br>
                </p>
                @endforeach
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>


@endsection