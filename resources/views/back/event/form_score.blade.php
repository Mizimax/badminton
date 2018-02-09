<div class="row">
    <div class="col-xs-4" align="center">
        <h4 class="font-bold">{{$teams[0]->team_name}}</h4>
        @foreach($teams[0]->member as $m)
        <span class="font-med">{{$m->name}}</span><br>
        @endforeach
    </div>
    <div class="col-xs-1" align="center"><h2>VS</h2></div>
    <div class="col-xs-4" align="center">
        <h4 class="font-bold">{{$teams[1]->team_name}}</h4>
        @foreach($teams[1]->member as $m)
            <span class="font-med">{{$m->name}}</span><br>
        @endforeach
    </div>
    <div class="col-xs-3">
    <br><br>
    <span class="font-med font-bold">เลือกทีมที่ชนะ</span>
    </div>
</div>


@foreach($set as $s)
<div class="row">
    <div class="col-xs-4">
        <input type="text" class="form-control" id="team1_{{$s['set_id']}}" name="team1_{{$s['set_id']}}" value="{{$s['set_score_team_1']}}">
    </div>
    <div class="col-xs-1"></div>
    <div class="col-xs-4">
        <input type="text" class="form-control" id="team2_{{$s['set_id']}}" name="team2_{{$s['set_id']}}" value="{{$s['set_score_team_2']}}">
    </div>
    <div class="col-xs-3">
        <select id="set_team_win_{{$s['set_id']}}" name="set_team_win_{{$s['set_id']}}" class="form-control">
            @foreach ($teams as $team)
                <option value="{{$team->team_member_team_id}}"
                @if($team->team_member_team_id == $s['set_team_win'])
                selected
                @endif    
                >{{$team->team_name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
    </div>
    <div class="col-xs-3"></div>
</div>
@endforeach
<br>
<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-xs-6" align="center">
        <button class="btn btn-primary">แก้ไขคะแนน</button>
    </div>
    <div class="col-xs-3"></div>
</div>