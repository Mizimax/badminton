@foreach($result_match as $line => $match)
@if($match)
<div class="row match-container">   
    <div class="col-xs-12">
    <div class="rank left" style="display: inline-block;">
        <h2 class="color-black"><span class="font-bold">Rank {{$race_name}}</span> / GROUP {{$line}}</h2>
    </div>
    @if($line === 'A')
    <div class="col-xs-6 left rank right">
        <span class="button is-red font-meder is-outlined is-active match-select pointer" onclick="timeScoreToggle(this)">
            <span class="glyphicon glyphicon-time" style="margin-right: 5px"></span> เวลาแข่งขัน
        </span>
        <span href="#" class="button is-red font-meder is-outlined right match-select pointer" onclick="timeScoreToggle(this)">
            <span class="glyphicon glyphicon-blackboard" style="margin-right: 5px"></span> คะแนน
        </span>
    </div>
    @endif
    </div>
</div>
<div class="row">
    <div class="shadow" style="overflow-x:auto; padding: 15px 10px">
        <table class="table" id="table-match">
            <tr>
                <td class="col-xs-1" style="position: relative;" align="center">
                    <a href="#" class="button is-info font-meder max" style="padding: 1px 10px;position: absolute;bottom: 0;left: 44%;transform: translateX(-50%);">
                        Point
                    </a>
                </td>
                <td class="col-xs-2" align="center"></td>
                @foreach($team_math[$line] as $k=> $team)
                <td class="col-xs-2" style="min-width: 140px">
                <div class="media">
                    <div class="media-left media-middle">
                        <div style="width: 15px;
                        height: 15px;
                        background: #{{$color_team[$line][$k]}};
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 50%;"></div>
                    </div>
                    <div class="media-body">
                    @foreach($team as $mem)
                    {{$mem->name}} <br>
                    @endforeach
                    </div>
                </div>
                </td>
                
                @endforeach
                
            </tr>

            
            @foreach($match as $team =>$detail_math)
            <tr>
                <td align="center" style="border-right:1px solid #ccc">
                    ชนะ {{$score_team[$line][$team]['total']}} set <br>
                    คะแนนรวม {{$score_team[$line][$team]['score']}}
                </td>
                <td style="display: table-cell;vertical-align: middle;">
                <div class="media">
                    
                    <div class="media-left media-middle">
                        <div style="width: 15px;
                        height: 15px;
                        background: #{{$color_team[$line][$team]}};
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 50%;"></div>
                    </div>
                    <div class="media-body">
                    @foreach($team_math[$line][$team] as $mem)
                        {{$mem->name}} <br>
                    @endforeach
                    </div>
                </div>


                    
                </td>
                @foreach($detail_math as $team_2 => $m)
                
                    @if($team != $team_2)
                         <td align="center" style="display: table-cell; vertical-align: middle;">
                            <div class="media">
                                @if($m['match_status'] == "END")
                                    <?php $win = [$m['match_team_1'] => 0,$m['match_team_2'] => 0];?>
                                    @foreach($m['score'] as $score)
                                    <?php 
                                        if($score['set_team_win']){
                                            $win[$score['set_team_win']]++;
                                        }
                                    ?>
                                    @endforeach
                                    @if($win[$m['match_team_1']] == 2)
                                        <div class="media-left media-middle">
                                            <div style="width: 15px;
                                            height: 15px;
                                            background: #{{$color_team[$line][$m['match_team_1']]}};
                                            -moz-border-radius: 50%;
                                            -webkit-border-radius: 50%;
                                            border-radius: 50%;"></div>
                                        </div>
                                    @endif
                                    @if($win[$m['match_team_2']] == 2)
                                        <div class="media-left media-middle">
                                            <div style="width: 15px;
                                            height: 15px;
                                            background: #{{$color_team[$line][$m['match_team_2']]}};
                                            -moz-border-radius: 50%;
                                            -webkit-border-radius: 50%;
                                            border-radius: 50%;"></div>
                                        </div>
                                    @endif
                                
                                @endif
                                <div class="media-body">
                                    <span class="score">
                                    @foreach($m['score'] as $score)
                                        {{$score['set_score_team_1']}} - {{$score['set_score_team_2']}}<br>
                                    @endforeach
                                    </span>
                                    <span href="#" class="button is-red font-meder is-outlined is-active match_time" >
                                        <span class="font-small" style="margin-right: 8px; color: #eee">M{{$m['match_number']}}</span>
                                        <span class="font-big">{{$m['time_stamp']}}</span>
                                    </span>
                                </div>
                            </div>
                            
                        </td>
                    @else
                    <td style="background-color:#e6e6e6"></td>
                    @endif
                
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endif
@endforeach