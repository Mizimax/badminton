<div class="row">
    <div class="col-xs-5" align="center">
        <h4 class="font-bold">{{$teams[0]->team_name}}</h4>
        @foreach($teams[0]->member as $m)
        <span class="font-med">{{$m->name}}</span><br>
        @endforeach
    </div>
    <div class="col-xs-2" align="center"><h2>VS</h2></div>
    <div class="col-xs-5" align="center">
        <h4 class="font-bold">{{$teams[1]->team_name}}</h4>
        @foreach($teams[1]->member as $m)
            <span class="font-med">{{$m->name}}</span><br>
        @endforeach
    </div>
</div>


@foreach($set as $key => $s)
<div class="row" style="margin-top:10px">
    <div class="col-xs-5">
        <input type="text" class="form-control" id="team1_{{$s['set_id']}}" name="team1_{{$s['set_id']}}" value="{{$s['set_score_team_1']}}">
    </div>
    <div class="col-xs-2 font-meder font-bold" style="margin-top: 7px">เซต {{$key+1}}</div>
    <div class="col-xs-5">
        <input type="text" class="form-control" id="team2_{{$s['set_id']}}" name="team2_{{$s['set_id']}}" value="{{$s['set_score_team_2']}}">
    </div>
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