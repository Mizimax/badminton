<!-- manager -->
@if($event->event_user_id === Auth::id() || isAdmin())
<div class="nav-manage" id="manager" align="center">
    <div class="manager fixed">
        <div class="circle shadow-black" style="background-image: url({{ Auth::user()->user_profile }})">
        </div>
        <div style="color:#888; margin-top:10px">แก้ไขสถานะโดย</div>
        <b class="color-black">{{ Auth::user()->name }}</b>
        <div>
            <div class="circle inline" style="width: 10px; height: 10px; background:green"></div> <span style="color:#999">Online/Editable</span>
        </div>
    </div>
    
    <div class="manager-right fixed" align="center">
        <span class="normal">Normal</span>
        <img class="dice" src="/images/events/dice.svg" style="margin-top:25px;">
        <div class="dice-txt">สุ่มรายชื่อใบสาย แบ่งกลุ่ม<br>(จัดทีละมือและแยกชื่อทีม)</div>
        <br>
    </div>
    
</div>
@endif
<div class="table-responsive">
<table id="table-member" class="table table-hover">
    <thead>
        <tr>
            <th class="col-xs-2" style="text-align:center;padding-top: 0;">ทีม</th>
            @for( $order = 1; $order <= $number_of_team; $order++)
            <th class="col-xs-2" style="text-align:center"><strong>ผู้เล่น {{$order}}</strong></th>
            @endfor
            <th class="col-xs-1" style="text-align:center"><strong>อันดับมือ</strong></th>
            <th class="col-xs-2" style="text-align:center"><strong>สถานะประเมิน</strong></th>
            <th class="col-xs-1" style="text-align:center"><strong>ชำระเงิน</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($my_team as $team)
        <tr style="background: #8ED5ED; color: white">
            <td style="text-align:center; font-weight: bold">
                {{$team['team_name']}}
            </td>
            @for( $order = 0; $order < $number_of_team; $order++)
            <td style="text-align:center">{{$team['member'][$order]->name}}</td>
            @endfor
            <td style="text-align:center">
                <span class="label" style="background-color:{{$team['race_color']}}">
                    {{$team['race_name']}}
                </span>
            </td>
             <td style="text-align:center">
            @if ($team['team_status'] == 2)
            <span class="label label-success">{{$team['team_status_name']}}</span>
            @elseif ($team['team_status'] == 3)
            <span class="label label-danger">{{$team['team_status_name']}}</span>
            @elseif ($team['team_status'] == 1)
            <span class="label label-info">{{$team['team_status_name']}}</span>
            @endif
            
            </td>
            <td style="text-align:center">
            @if($team['team_payment'] == 1)
                <span class="glyphicon glyphicon-ok-sign" style="color:#d9e047; font-size: 15px"></span>
            @elseif($team['team_status'] == 3)
                @if($team['team_comment'])
                    <img onclick="swal('ไม่ผ่านการประเมิน', '{{$team['team_comment']}}', 'error')" style="cursor: pointer;" src="/images/warning.png" width="15" data-toggle="tooltip" title="คลิกเพื่อทราบเหตุผล">
                @endif
            @endif
            </td>
        </tr>
        @endforeach
        @foreach($members as $key=>$data)
        <tr>
            <td style="text-align:center; font-weight: bold">
                @if($event->event_user_id === Auth::id() || isAdmin())
                <div class="remove pointer" onclick="remove(this, { id: {{ $data['team_id'] }}, name: {{ json_encode($data['member']) }} })">X</div>
                @endif
                {{$data['team_name']}}
            </td>
            @for( $order = 0; $order < $number_of_team; $order++)
            <td style="text-align:center">{{$data['member'][$order]->name}}</td>
            @endfor
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
            class="label label-success {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}">{{$data['team_status_name']}}</span>
            @elseif ($data['team_status'] == 3)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-danger {{ ($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer' : '' }}">{{$data['team_status_name']}}</span>
            @elseif ($data['team_status'] == 1)
            <span
            @if($event->event_user_id === Auth::id() || isAdmin())
            onclick="hand(this, {{ $data['team_id'] }})"
            @endif
            class="label label-info pointer">{{$data['team_status_name']}}</span>
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
    </tbody>
</table>
</div>