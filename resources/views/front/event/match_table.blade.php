@foreach($result_match as $line => $match)
@if($match)
<div class="row match-container">   
    <div class="col-xs-12">
    <div class="rank left" style="display: inline-block;">
        <h2 class="color-black"><span class="font-bold">Rank {{$race_name}}</span> / GROUP {{$line}}</h2>
    </div>
    <!-- @if($line === 'A')
    <div class="col-xs-6 left rank right">
        <span class="button is-red font-meder is-outlined is-active match-select pointer" onclick="timeScoreToggle(this)">
            <span class="glyphicon glyphicon-time" style="margin-right: 5px"></span> เวลาแข่งขัน
        </span>
        <span href="#" class="button is-red font-meder is-outlined right match-select pointer" onclick="timeScoreToggle(this)">
            <span class="glyphicon glyphicon-blackboard" style="margin-right: 5px"></span> คะแนน
        </span>
    </div>
    @endif -->
    </div>
</div>
<div class="row">
    <div class="shadow" style="overflow-x:auto; padding: 15px 10px">
        <table class="table" id="table-match">
            <tr>
                <td class="col-xs-1 team_status" style="position: relative; min-width: 60px" align="center">
                    <a href="#" class="button is-info font-meder max" style="padding: 1px 10px;position: absolute;bottom: 0;left: 44%;transform: translateX(-50%);">
                        Point
                    </a>
                </td>
                <td class="col-xs-2 table-name" align="center"></td>
                @foreach($team_math[$line] as $k=> $team)
                <td class="col-xs-2 table-width">
                <div class="media">
                    <div class="media-left media-middle team-mobile">
                        <div style="width: 15px;
                        height: 15px;
                        background: #{{$color_team[$line][$k]}};
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 50%;"></div>
                    </div>
                    <div class="media-body team_status">
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
                <td align="center" class="team_status" style="border-right:1px solid #ccc">
                    <span style="font-size: 16px">
                        <span class="font-bold team" style="color:#209cee">{{$score_team[$line][$team]['total']}}</span> <span class="font-bold">/ {{ (count($match) -1) * 2 }}</span>
                    </span>
                    <br>
                    <span class="font-small font-bold" style="color:#888">{{$score_team[$line][$team]['score']}}</span>
                </td>
                <td style="display: table-cell;vertical-align: middle;">
                <div class="media">
                    
                    <div class="media-left media-middle" style="padding-right: 5px">
                        <div style="width: 15px;
                        height: 15px;
                        background: #{{$color_team[$line][$team]}};
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 50%;"></div>
                    </div>
                    
                    <div class="media-body {{ $line_type === 1 ? 'team_mem' : '' }}">
                    <div class="hide" race-id="{{ $race_id }}" team-id="{{ $team }}" line="{{ $line }}"></div>
                    @foreach($team_math[$line][$team] as $mem)
                        {{$mem->name}} <br>
                    @endforeach
                    </div>
                </div>


                    
                </td>
                @foreach($detail_math as $team_2 => $m)
                
                    @if($team != $team_2)
                         <td align="center" style="display: table-cell; vertical-align: middle;">
                            <div class="media {{($event->event_user_id === Auth::id() || isAdmin()) ? 'pointer':''}}"
                            @if($event->event_user_id === Auth::id() || isAdmin())
                            onclick="{{$line_type === 0? 'editScore('.$m['match_number'].')' : 'editTime('.$m['match_number'].', this)' }}"
                            @endif        
                            >
                                    @if($m['match_status'] == "END" && ($event->event_user_id === Auth::id() || isAdmin()))
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
                                        @elseif($win[$m['match_team_2']] == 2)
                                            <div class="media-left media-middle">
                                                <div style="width: 15px;
                                                height: 15px;
                                                background: #{{$color_team[$line][$m['match_team_2']]}};
                                                -moz-border-radius: 50%;
                                                -webkit-border-radius: 50%;
                                                border-radius: 50%;"></div>
                                            </div>
                                        @else
                                            <div class="media-left media-middle">
                                                <div style="width: 15px;
                                                height: 15px;
                                                background: linear-gradient(90deg, #{{$color_team[$line][$m['match_team_1']]}} 50%, #{{$color_team[$line][$m['match_team_2']]}} 50%);
                                                -moz-border-radius: 50%;
                                                -webkit-border-radius: 50%;
                                                border-radius: 50%;"></div>
                                            </div>  
                                        @endif
                                        <div class="media-body">
                                            <span>
                                            @foreach($m['score'] as $score)
                                                {{$score['set_score_team_1']}} - {{$score['set_score_team_2']}}<br>
                                            @endforeach
                                            </span>
                                        </div>
                                    @else
                                        <div class="media-body">
                                            <span href="#" class="button is-red font-meder is-outlined is-active match_time">
                                                <span class="font-small team_status" style="color: #eee">M{{$m['match_number']}}</span>
                                                <span class="font-big">{{$m['time_stamp']}}</span>
                                            </span>
                                        </div>
                                    @endif
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