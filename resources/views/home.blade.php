@extends('layouts.app')
@section('css')
<style>
.w3-bar-item {
  font-size: 15px !important;
}
.w3-bar-item.active {
  background: rgb(255, 154, 127);
}
.nav-tabs {
  border-bottom: none;
}
.bts-popup {
      overflow: auto;
    }
</style>
@endsection
@section('content')
<link href="/css/home.css?v=1.3" rel="stylesheet">
<link href="/css/popup.css?v=1.3" rel="stylesheet">
<link href="/css/datepicker.min.css" rel="stylesheet">
<link href="/css/wezync.css?v=1.3" rel="stylesheet">
    <div class="row" style="background-color:#000; position: relative">
            <div class="slick max">
                    @foreach ($sponsors as $k=>$sponsor)
                        <div class="relative slick-height">
                            <div class="bg-blur slick-height" style="background-image: url('{{$sponsor['sponsor_image']}}');position: absolute;
                              width: 100%;
                              top: 0;
                              left: 0;
                              background-position: top center;
                              background-repeat: no-repeat;
                              background-size: cover;
                              -webkit-filter: blur(20px);
                              -moz-filter: blur(20px);
                              -o-filter: blur(20px);
                              -ms-filter: blur(20px);
                              filter: blur(20px);">

                            </div>

                                <img src="{{$sponsor['sponsor_image']}}" class="container absolute header">

                                <div class="carousel-caption">
                                </div>
                          </div>
                    @endforeach
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
                                    <h2 class="remove-padding white event-title" style="color: white; font-weight: 900;" >{{$event['event_title']}} <span class="font-small tag {{ $event['event_status'] == 3 ? 'red': '' }}">{{ $event['event_status'] == 1 ? 'อีก ' . $event['day_left'] . ' วัน' : 'สิ้นสุดการแข่งขัน' }}</span></h2>
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
                                  <!-- <button type="button" onClick="set_event({{$event['event_id']}})" class="button is-info btn btn-slim btn-outline-primary" style="width: 100px;margin-bottom:2px;" data-toggle="modal" data-target="#register_event_modal">สมัครการแข่ง</button> -->
                                  <a type="button" href="{{$event['register_google']}}" target="_blank" class="button is-info btn btn-slim btn-outline-primary" style="width: 100px;margin-bottom:2px;" >สมัครการแข่ง</a>
                                 @elseif( $event['event_status'] == 2)
                                 <button type="button" class="btn btn-brown btn-slim" style="width:100px; background-color:#f10505;" onclick="window.location='/event/{{$event['event_id']}}#/match'">แข่งขันอยู่</button>
                                 @elseif( $event['event_status'] == 5)
                                 <button type="button" class="btn btn-brown btn-slim" style="width:100px; background-color:#f10505;">ยกเลิกการแข่ง</button>
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


     <div class="bts-popup" role="alert">
     <div class="bts-popup-container" style="border-radius:10px; ">
      <div class="w3-container"style="">
        <div id="filter-popup">
<ul class="nav nav-tabs">
<div class="w3-bar" style=" margin-top: 15px;">

  <li>  <a data-toggle="tab" href="#monday" class="active w3-bar-item w3-button" style="width:14.28%">วันจันทร์</a></li>
  <li>  <a data-toggle="tab" href="#tuesday" class="active w3-bar-item w3-button" style="width:14.28%">วันอังคาร</a></li>
  <li>  <a data-toggle="tab" href="#wednesday" class="active w3-bar-item w3-button"  style="width:14.28%">วันพุธ</a></li>
  <li>  <a data-toggle="tab" href="#thursday" class="active w3-bar-item w3-button"  style="width:14.28%">วันพฤหัส</a></li>
  <li>  <a data-toggle="tab" href="#friday" class="active w3-bar-item w3-button" style="width:14.28%">วันศุกร์</a></li>
    <li><a data-toggle="tab" href="#saturday" class="active w3-bar-item w3-button"  style="width:14.28%">วันเสาร์</a></li>
  <li>  <a data-toggle="tab" href="#sunday" class="active w3-bar-item w3-button"  style="width:14.28%">วันอาิทตย์</a></li>

</div>
</ul>
</div>
<div id="calendar" >
  <div class="input"  style="margin:0 auto;max-width: 100%; background:#ff2124;color:#fff;width: 250px;transform: translateY(-10%); font-size: 15px">
    <span class="display" id="spanid" style="text-align: center">{{$dayname}}</span> <span class="icon dropdown">▼</span>
  </div>
<div class="input-dropdown event shadow-black item">
    <div  data-toggle="tab" id="button1" href="#monday"class="item-dropdown" onclick="searchTable(this)"><div class="item display">จันทร์</div></div>
    <div data-toggle="tab" id="button2" href="#tuesday"class="item-dropdown" onclick="searchTable(this)"><div class="item display">อังคาร</div></div>
    <div   data-toggle="tab" id="button3" href="#wednesday"class="item-dropdown" onclick="searchTable(this)"><div class="item display">พุธ</div></div>
    <div  data-toggle="tab" id="button4" href="#thursday"class="item-dropdown" onclick="searchTable(this)"><div class="item display">พฤ</div></div>
    <div data-toggle="tab" id="button5" href="#friday" class="item-dropdown" onclick="searchTable(this)"><div class="item display">ศุกร์</div></div>
    <div  data-toggle="tab" id="button6" href="#saturday"class="item-dropdown" onclick="searchTable(this)"><div class="item display">เสาร์</div></div>
    <div data-toggle="tab" id="button7" href="#sunday"class="item-dropdown" onclick="searchTable(this)"><div class="item display">อาทิตย</div></div>

</div>
</div>

          <div class="tab-content">
          <div id="allDay" class="tab-pane active in fade">
          @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
@if(($day)==1)
  @if(gettype(strrpos($gang->text, "จัน")) === "integer" && strrpos($gang->text, "จัน") >= 0)
  <div class="box-pop">
      <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
      <div class="absolute box-overlay-popup box-image col-sm-4"></div>
      <div class="remove-padding box-content-popup">
        <div class="row">
            <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
            </div>
        </div>
          </div>
          <div class="remove-padding box-content">
              <div class="row" id="detail-btn">
               <div  class="col-xs-6 pop-gang-popup-day font-tai">
                  <div class="font-tai">  <span>{{ $gang->text }}</span>  </div>
                  <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                   <div  class="col-xs-6 font-tai" align="right" >
                     <div class="font-tai-mo">
                    <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                     <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                      <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                         <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                         </div>
                  </div>
              </div>
      </div>
</div>
      @endif
          @endif
          @if(($day)==2)
            @if(gettype(strrpos($gang->text, "อัง")) === "integer" && strrpos($gang->text, "อัง") >= 0)
            <div class="box-pop">
                <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
                <div class="absolute box-overlay-popup box-image col-sm-4"></div>
                <div class="remove-padding box-content-popup">
                  <div class="row">
                      <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                          <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                      </div>
                  </div>
                    </div>
                    <div class="remove-padding box-content">
                        <div class="row" id="detail-btn">
                         <div  class="col-xs-6 pop-gang-popup-day font-tai">
                            <div >  <span >{{ $gang->text }}</span>  </div>
                            <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                             <div  class="col-xs-6 font-tai" align="right" >
                               <div class="font-tai-mo">
                              <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                               <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                                <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                                   <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                                   </div>
                            </div>
                        </div>
                </div>
          </div>
                @endif
                    @endif
                    @if(($day)==3)
                      @if(gettype(strrpos($gang->text, "พุธ")) === "integer" && strrpos($gang->text, "พุธ") >= 0)
                      <div class="box-pop">
                          <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
                          <div class="absolute box-overlay-popup box-image col-sm-4"></div>
                          <div class="remove-padding box-content-popup">
                            <div class="row">
                                <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                                    <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                                </div>
                            </div>
                              </div>
                              <div class="remove-padding box-content">
                                  <div class="row" id="detail-btn">
                                   <div  class="col-xs-6 pop-gang-popup-day font-tai">
                                      <div >  <span >{{ $gang->text }}</span>  </div>
                                      <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                                       <div  class="col-xs-6 font-tai" align="right" >
                                         <div class="font-tai-mo">
                                        <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                                         <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                                          <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                                             <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                                             </div>
                                      </div>
                                  </div>
                          </div>
                    </div>
                          @endif
                              @endif
                              @if(($day)==4)
                                @if(gettype(strrpos($gang->text, "พฤ")) === "integer" && strrpos($gang->text, "พฤ") >= 0)
                                <div class="box-pop">
                                    <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
                                    <div class="absolute box-overlay-popup box-image col-sm-4"></div>
                                    <div class="remove-padding box-content-popup">
                                      <div class="row">
                                          <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                                              <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                                          </div>
                                      </div>
                                        </div>
                                        <div class="remove-padding box-content">
                                            <div class="row" id="detail-btn">
                                             <div class="col-xs-6 pop-gang-popup-day font-tai">
                                                <div >  <span >{{ $gang->text }}</span>  </div>
                                                <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                                                 <div  class="col-xs-6 font-tai" align="right" >
                                                   <div class="font-tai-mo">
                                                  <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                                                   <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                                                    <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                                                       <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                                                       </div>
                                                </div>
                                            </div>
                                    </div>
                              </div>
                                    @endif
                                        @endif
                                        @if(($day)==5)
                                          @if(gettype(strrpos($gang->text, "ศุก")) === "integer" && strrpos($gang->text, "ศุก") >= 0)
                                          <div class="box-pop">
                                              <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
                                              <div class="absolute box-overlay-popup box-image col-sm-4"></div>
                                              <div class="remove-padding box-content-popup">
                                                <div class="row">
                                                    <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                                                        <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                                                    </div>
                                                </div>
                                                  </div>
                                                  <div class="remove-padding box-content">
                                                      <div class="row" id="detail-btn">
                                                       <div  class="col-xs-6 pop-gang-popup-day font-tai">
                                                          <div >  <span >{{ $gang->text }}</span>  </div>
                                                          <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                                                           <div  class="col-xs-6 font-tai" align="right" >
                                                             <div class="font-tai-mo">
                                                            <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                                                             <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                                                              <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                                                                 <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                                                                 </div>
                                                          </div>
                                                      </div>
                                              </div>
                                        </div>
                                              @endif
                                                  @endif
                                                  @if(($day)==6)
                                                    @if(gettype(strrpos($gang->text, "เสา")) === "integer" && strrpos($gang->text, "เสา") >= 0)
                                                    <div class="box-pop">
                                                        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
                                                        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
                                                        <div class="remove-padding box-content-popup">
                                                          <div class="row">
                                                              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                                                                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                                                              </div>
                                                          </div>
                                                            </div>
                                                            <div class="remove-padding box-content">
                                                                <div class="row" id="detail-btn">
                                                                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                                                                    <div >  <span >{{ $gang->text }}</span>  </div>
                                                                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                                                                     <div  class="col-xs-6 font-tai" align="right" >
                                                                       <div class="font-tai-mo">
                                                                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                                                                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                                                                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                                                                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                                                                           </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                  </div>
                                                        @endif
                                                            @endif
                                                            @if(($day)==7)
                                                              @if(gettype(strrpos($gang->text, "อาทิ")) === "integer" && strrpos($gang->text, "ิอาทิ") >= 0)
                                                              <div class="box-pop">
                                                                  <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
                                                                  <div class="absolute box-overlay-popup box-image col-sm-4"></div>
                                                                  <div class="remove-padding box-content-popup">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                                                                            <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                                                                        </div>
                                                                    </div>
                                                                      </div>
                                                                      <div class="remove-padding box-content">
                                                                          <div class="row" id="detail-btn">
                                                                           <div  class="col-xs-6 pop-gang-popup-day font-tai">
                                                                              <div >  <span >{{ $gang->text }}</span>  </div>
                                                                              <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                                                                               <div  class="col-xs-6 font-tai" align="right" >
                                                                                 <div class="font-tai-mo">
                                                                                <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                                                                                 <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                                                                                  <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                                                                                     <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                                                                                     </div>
                                                                              </div>
                                                                          </div>
                                                                  </div>
                                                            </div>
                                                                  @endif
                                                                      @endif
      @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach


          </div>
          <div id="monday" class="tab-pane fade">
          @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
      @if(gettype(strrpos($gang->text, "จัน")) === "integer" && strrpos($gang->text, "จัน") >= 0)
      <div class="box-pop">
          <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
          <div class="absolute box-overlay-popup box-image col-sm-4"></div>
          <div class="remove-padding box-content-popup">
            <div class="row">
                <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                    <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
                </div>
            </div>
              </div>
              <div class="remove-padding box-content">
                  <div class="row" id="detail-btn">
                   <div  class="col-xs-6 pop-gang-popup-day font-tai">
                      <div >  <span >{{ $gang->text }}</span>  </div>
                      <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                       <div  class="col-xs-6 font-tai" align="right" >
                         <div class="font-tai-mo">
                        <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                         <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                          <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                             <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                             </div>
                      </div>
                  </div>
          </div>
    </div>
      @endif
      @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach


</div>
            <div id="tuesday" class="tab-pane fade">
            @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
    @if(gettype(strrpos($gang->text, "อังคาร")) === "integer" && strrpos($gang->text, "อังคาร") >= 0)
    <div class="box-pop">
        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
        <div class="remove-padding box-content-popup">
          <div class="row">
              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
              </div>
          </div>
            </div>
            <div class="remove-padding box-content">
                <div class="row" id="detail-btn">
                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                    <div >  <span >{{ $gang->text }}</span>  </div>
                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                     <div  class="col-xs-6 font-tai" align="right" >
                       <div class="font-tai-mo">
                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                           </div>
                    </div>
                </div>
        </div>
  </div>
    @endif
    @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach

            </div>


            <div id="wednesday" class="tab-pane fade">
            @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
    @if(gettype(strrpos($gang->text, "พุธ")) === "integer" && strrpos($gang->text, "พุธ") >= 0)
    <div class="box-pop">
        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
        <div class="remove-padding box-content-popup">
          <div class="row">
              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
              </div>
          </div>
            </div>
            <div class="remove-padding box-content">
                <div class="row" id="detail-btn">
                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                    <div >  <span >{{ $gang->text }}</span>  </div>
                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                     <div  class="col-xs-6 font-tai" align="right" >
                       <div class="font-tai-mo">
                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                           </div>
                    </div>
                </div>
        </div>
  </div>
    @endif
    @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach

            </div>
            <div id="thursday" class="tab-pane fade">
            @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
    @if(gettype(strrpos($gang->text, "พฤหัส")) === "integer" && strrpos($gang->text, "พฤหัส") >= 0)
    <div class="box-pop">
        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
        <div class="remove-padding box-content-popup">
          <div class="row">
              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
              </div>
          </div>
            </div>
            <div class="remove-padding box-content">
                <div class="row" id="detail-btn">
                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                    <div >  <span >{{ $gang->text }}</span>  </div>
                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                     <div  class="col-xs-6 font-tai" align="right" >
                       <div class="font-tai-mo">
                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                           </div>
                    </div>
                </div>
        </div>
  </div>
    @endif
    @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach
            </div>
            <div id="friday" class="tab-pane fade">
            @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
    @if(gettype(strrpos($gang->text, "ศุกร์")) === "integer" && strrpos($gang->text, "ศุกร์") >= 0)
    <div class="box-pop">
        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
        <div class="remove-padding box-content-popup">
          <div class="row">
              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
              </div>
          </div>
            </div>
            <div class="remove-padding box-content">
                <div class="row" id="detail-btn">
                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                    <div >  <span >{{ $gang->text }}</span>  </div>
                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                     <div  class="col-xs-6 font-tai" align="right" >
                       <div class="font-tai-mo">
                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                           </div>
                    </div>
                </div>
        </div>
  </div>
    @endif
    @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach


            </div>
            <div id="saturday" class="tab-pane fade">
            @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
    @if(gettype(strrpos($gang->text, "เสาร์")) === "integer" && strrpos($gang->text, "เสาร์") >= 0)
    <div class="box-pop">
        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
        <div class="remove-padding box-content-popup">
          <div class="row">
              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
              </div>
          </div>
            </div>
            <div class="remove-padding box-content">
                <div class="row" id="detail-btn">
                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                    <div >  <span >{{ $gang->text }}</span>  </div>
                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                     <div  class="col-xs-6 font-tai" align="right" >
                       <div class="font-tai-mo">
                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                           </div>
                    </div>
                </div>
        </div>
  </div>
    @endif
    @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach

            </div>
            <div id="sunday" class="tab-pane fade">
            @foreach ($gangs as $gng)
          <div class="area" align="left" >{{$gng[0]->area === 0 ? "ฝั่งธน": "ฝั่งพระนคร"}}</div>
          <div class="box-container-2 box-margin " >
      @foreach ($gng as $gang)
    @if(gettype(strrpos($gang->text, "อาทิตย์")) === "integer" && strrpos($gang->text, "อาทิตย์") >= 0)
    <div class="box-pop">
        <div class=" row padding box-image relative " align="center" style="background-image: url('{{$gang->img}}')">
        <div class="absolute box-overlay-popup box-image col-sm-4"></div>
        <div class="remove-padding box-content-popup">
          <div class="row">
              <div class="col-sm-12 remove-padding  popup" style="margin-top: 10px">
                  <span class="btn-detail-popup" > <a target="_blank"  " href="{{$gang->count_url}}"><strong style="">{{$gang->count}}</strong></a></span>
              </div>
          </div>
            </div>
            <div class="remove-padding box-content">
                <div class="row" id="detail-btn">
                 <div  class="col-xs-6 pop-gang-popup-day font-tai">
                    <div >  <span >{{ $gang->text }}</span>  </div>
                    <span class="font-tai-time" >{{$gang->timeopen}} - {{ $gang->timeclose }}</span></div>
                     <div  class="col-xs-6 font-tai" align="right" >
                       <div class="font-tai-mo">
                      <span class="badge badge-orange pop-gang-popup-typemin ">{{ $gang->rank_min }}</span>
                       <span class="ppop-gang-popup-typemin"style="font-size:25px;color:#fff;">-</span>
                        <span class="badge badge-orange pop-gang-popup-typemax">{{ $gang->rank_max }}</span> </div>
                           <span  ><b style=" text-decoration: underline;">{{$gang->name}}</b></span>
                           </div>
                    </div>
                </div>
        </div>
  </div>
    @endif
    @endforeach
    </div>
    <hr style="border-top:1px solid red;">
    @endforeach

            </div>
          </div>

</div>

      <a href="#0" class="bts-popup-close img-replace popup-cloes">Close</a>
</div>



@endsection
@section('scripts')

    <script src="/js/home.js?v=2"></script>
    <script src="/js/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
      $(document).ready(function () {
        $('.slick.max').slick({
          autoplay: true,
          dots: true,
          arrows: false,
          vertical: true,
          verticalSwiping: true,
          autoplaySpeed: 5000,
          dotsClass: 'carousel-indicators mydots'
        });
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true
            });

            $('.w3-bar li').click(function(){
              $('.w3-bar li.active').removeClass('active');

            });
            $('#button1').click(function(){
              $("#spanid").html("จันทร์");
              });
              $('#button2').click(function(){
                $("#spanid").html("อังคาร");
                });
                $('#button3').click(function(){
                  $("#spanid").html("พุธ");
                  });
                  $('#button4').click(function(){
                    $("#spanid").html("พฤ์");
                    });
                    $('#button5').click(function(){
                      $("#spanid").html("ศุกร์์");
                      });
                      $('#button6').click(function(){
                        $("#spanid").html("เสาร์");
                        });
                        $('#button7').click(function(){
                          $("#spanid").html("อาทิตย์์");
                          });





        });
    </script>

    <script type="text/javascript">
    jQuery(document).ready(function($){
    window.onload = function (){
      $(".bts-popup").delay(10).addClass('is-visible');
    }
    //open popup
    $('.bts-popup-trigger').on('click', function(event){
      event.preventDefault();
      $('.bts-popup').addClass('is-visible');
    });
    //close popup
    $('.bts-popup').on('click', function(event){
      if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
        event.preventDefault();
        $(this).removeClass('is-visible');
      }
    });
    });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127412532-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-127412532-1');
</script>




@endsection
