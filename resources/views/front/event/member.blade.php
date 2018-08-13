<!-- manager -->
@if($event->event_user_id === Auth::id() || isAdmin())
<div class="nav-manage" id="manager" align="center">
    <div class="manager fixed">
        <div class="circle shadow-black" style="background-image: url({{ Auth::user()->user_profile }})">
        </div>
        <div style="color:#888; margin-top:10px">แก้ไขสถานะโดย</div>
        <b class="color-black">{{ Auth::user()->name }}</b>
        <div>
            <div class="circle inline" style="width: 10px; height: 10px; background:#7EE08D"></div> <span style="color:#999">Online/Editable</span>
        </div>
    </div>

    <div class="manager-right fixed" align="center">
    @if(!isset($line_type) || $line_type === 1)
        <span class="normal">Normal</span>
        <label class="hideName pointer"><span><input onchange="hideName()" type="checkbox" name="hide-name" style="margin-bottom:7px" {{ $event->member_status == 1 ? 'checked':''}}> ซ่อนรายชื่อ</span></label>
        <img class="dice" src="/images/events/dice.svg" style="margin-top:5px;" onclick="judsai()">
        <div class="dice-txt">สุ่มรายชื่อใบสาย แบ่งกลุ่ม<br>(จัดทีละมือและแยกชื่อทีม)</div>
        <br>
    @else
        <span class="normal">Normal</span>
        <label class="hideName pointer"><span><input onchange="hideName()" type="checkbox" name="hide-name" style="margin-bottom:7px" {{ $event->member_status == 1 ? 'checked':''}}> ซ่อนรายชื่อ</span></label>
        <div class="print" style="margin-top:10px"><img src="/images/events/print.svg" width="60"></div>
        <form method="post" id="excel" action="/event/{{$event->event_id}}/member/excel" target="_blank">
            <div class="excel pointer" style="margin-top:10px"><img src="/images/events/excel.svg" width="60" onclick="$('#excel').submit()"></div>
        </form>
    @endif
    </div>

</div>
<div class="nav-manage-mobile">
    <div class="left">
        <div class="hide">

        </div>
        <span class="premium relative" onclick="menuToggle(this)">
            <span class="absolute middle">Premium</span>
            <span class="glyphicon glyphicon-remove absolute middle hide" style="font-size:18px;"></span>
        </span>
    </div>
    <div class="right">
        <div class="hide">
            @if(!isset($line_type) || $line_type === 1)
            <img class="menu-mobile" src="/images/events/dice.svg" onclick="judsai()">
            @else
            <img class="menu-mobile" src="/images/events/print.svg">
            <form method="post" id="excel-mobile" action="/event/{{$event->event_id}}/member/excel" target="_blank">
                <img class="menu-mobile" src="/images/events/excel.svg" onclick="$('#excel-mobile').submit()">
            </form>
            @endif
        </div>
        <span class="menu-btn" onclick="menuToggle(this)">
            <span class="absolute middle">Menu</span>
            <span class="glyphicon glyphicon-remove absolute middle hide" style="font-size:18px;"></span>
        </span>
    </div>
</div>
@endif
@if($event->member_status === 0 || ($event->event_user_id === Auth::id() || isAdmin()))
<table id="table-member" class="table table-hover">
    <thead>
        <tr>
            <th class="col-xs-2" style="text-align:center;padding-top: 0;">ทีม</th>
            @for( $order = 1; $order <= 2; $order++)
            <th class="col-xs-2" style="text-align:center"><strong>ผู้เล่น {{$order}}</strong></th>
            @endfor
            <th class="col-xs-1" style="text-align:center"><strong>อันดับมือ</strong></th>
            <th class="col-xs-2" style="text-align:center"><strong>สถานะประเมิน</strong></th>
            <th class="col-xs-1" style="text-align:center"><strong>หมายเหตุ</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($my_team as $key=>$data)
        <tr class="pointer" style="background: #8ED5ED; color: white" >
            <td style="text-align:center; font-weight: bold">
                @if($event->event_user_id === Auth::id() || isAdmin())
                <div class="remove pointer" onclick="remove(this, { id: {{ $data['team_id'] }}, name: {{ json_encode($data['member']) }} })">X</div>
                @endif
                {{$data['team_name']}}
            </td>

            @if($data['race_event_type'] === 2)
                @for( $order = 0; $order < 2; $order++)
                <td style="text-align:center">{{$data['member'][$order]->name}}</td>
                @endfor
            @else
                <td style="text-align:center">{{$data['member'][0]->name}}</td>
                <td style="text-align:center">-</td>
            @endif

            <td style="text-align:center">
                <span class="label {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"
                @if($event->event_user_id === Auth::id() || isAdmin())
                onclick="race(this, {{ $data['team_id'] }})"
                @endif
                style="background-color:{{$data['race_color']}}">
                    {{$data['race_name']}}
                </span>
            </td>
            <td style="text-align:center">
            @if ($data['team_status'] == 2)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-success {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 4)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-canceled {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 5)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-contact {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 3)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-danger {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 1)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-info pointer"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @endif

            </td>
            <td class="pay {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}" style="text-align:center">
            <div class="payment"
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="payment(this, {{ $data['team_id'] }})"
            @endif
            >
            @if($data['team_payment'] == 1)
                <span class="glyphicon glyphicon-ok-sign" style="color:#d9e047; font-size: 15px"></span>
            @elseif($data['team_status'] == 3)
                @if($data['team_comment'])
                    <img onclick="swal('ไม่ผ่านการประเมิน', '{{$data['team_comment']}}', 'error')" style="cursor: pointer;" src="/images/warning.png" width="15" data-toggle="tooltip" title="คลิกเพื่อทราบเหตุผล">
                @endif
            @endif
            </div>
            </td>
        </tr>
        @endforeach
        @foreach($members as $key=>$data)
        <tr class="pointer">
            <td style="text-align:center; font-weight: bold">
                @if($event->event_user_id === Auth::id() || isAdmin())
                <div class="remove pointer" onclick="remove(this, { id: {{ $data['team_id'] }}, name: {{ json_encode($data['member']) }} })">X</div>
                @endif
                {{$data['team_name']}}
            </td>
            @if($data['race_event_type'] === 2)
                @for( $order = 0; $order < 2; $order++)
                <td style="text-align:center" onclick="{{($event->event_user_id === Auth::id() || isAdmin()) ? 'desc('.$data['team_id'].')' : '' }}">{{$data['member'][$order]->name}}</td>
                @endfor
            @else
                <td style="text-align:center" onclick="{{($event->event_user_id === Auth::id() || isAdmin()) ? 'desc('.$data['team_id'].')' : '' }}">{{$data['member'][0]->name}}</td>
                <td style="text-align:center" onclick="{{($event->event_user_id === Auth::id() || isAdmin()) ? 'desc('.$data['team_id'].')' : '' }}">-</td>
            @endif
            <td style="text-align:center">
                <span class="label {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"
                @if($event->event_user_id === Auth::id() || isAdmin())
                onclick="race(this, {{ $data['team_id'] }})"
                @endif
                style="background-color:{{$data['race_color']}}">
                    {{$data['race_name']}}
                </span>
            </td>
            <td style="text-align:center">
            @if ($data['team_status'] == 2)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-success {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 4)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-canceled {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 5)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-contact {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 3)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-danger {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @elseif ($data['team_status'] == 6)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-payment {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}"><span class="team_status">{{$data['team_status_name']}}</span></span>    @elseif ($data['team_status'] == 1)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-info pointer"><span class="team_status">{{$data['team_status_name']}}</span></span>
            @endif

            </td>
            <td class="pay {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}" style="text-align:center">
            <div class="payment"
            @if(($event->event_user_id === Auth::id() || isAdmin()) && !$data['team_comment'])
            onclick="payment(this, {{ $data['team_id'] }})"
            @endif
            >
            @if($data['team_payment'] == 10)
                <span class="glyphicon glyphicon-ok-sign" style="color:#d9e047; font-size: 15px"></span>
            @elseif($data['team_status'] <=10)
                @if($data['team_comment'])
                    <img onclick="swal('หมายเหตุ', '{{$data['team_comment']}}', 'error')" style="cursor: pointer;" src="/images/warning.png" width="17">
                @endif
            @endif
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<div class="row">
    <div class="col-xs-12" align="center" style="height: 200px">
        <span class="absolute middle">ยังไม่มีรายละเอียดผู้สมัคร</span>
    </div>
</div>
@endif
