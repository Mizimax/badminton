@extends('layouts.app')
@section('content')
<link href="{{ asset('css/event.css') }}" rel="stylesheet">
<link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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
            <div class="col-xs-12" align="center">
                <a href="#detail" id="detail_tab" type="button" class="btn btn-tab active" aria-controls="detail" role="tab" data-toggle="tab" onclick="clicktab('detail_tab')">
                    <img src="/images/events/detail.png" height="30"style="margin-bottom:10px;"><br>
                    รายละเอียด
                </a>
                <a href="#member" id="member_tab"  type="button" class="btn btn-tab" aria-controls="member" role="tab" data-toggle="tab" onclick="clicktab('member_tab')">
                <img src="/images/events/list-player.png" height="30"style="margin-bottom:10px;"><br>
                    รายชื่อผู้แข่งขัน
                </a>
                <a href="#math" id="math_tab"  type="button" class="btn btn-tab" aria-controls="math" role="tab" data-toggle="tab" onclick="clicktab('math_tab')">
                <img src="/images/events/match.png" height="30"style="margin-bottom:10px;"><br>
                    สายและการแข่งขัน
                </a>
                <a href="#picture" id="picture_tab"  type="button" class="btn btn-tab" aria-controls="picture" role="tab" data-toggle="tab" onclick="clicktab('picture_tab')">
                <img src="/images/events/picture.png" height="30"style="margin-bottom:10px;"><br>
                    รูปภาพ
                </a>
            </div>
        </div>
        <div class="row" style="height:20px;">
            <div class="col-md-12" align="center"></div>
        </div>   
    
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="detail">
            @include('front/event/detail')
        </div>
        <div role="tabpanel" class="tab-pane" id="member">
            @include('front/event/member')
        </div>
        <div role="tabpanel" class="tab-pane" id="math">...</div>
        <div role="tabpanel" class="tab-pane" id="picture">...</div>
    </div>



</div>
    <div class="col-md-3"></div>
</div>


<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/event.js') }}"></script>
@include('front/event/modal')

@endsection