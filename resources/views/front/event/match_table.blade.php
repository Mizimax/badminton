@foreach($result_match as $line => $match)
@if($match)
<div class="row">
    <div class="col-xs-1"></div>    
    <div class="col-xs-10">
    <h2>Rank {{$race_name}} / GROUP {{$line}}</h1>
    </div>
    <div class="col-xs-1"></div>
</div>
<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10" style="overflow-x:auto;">
        <table class="table table-bordered " id="table-match">
            <tr>
                <td class="col-xs-2">คะแนนรวม</td>
                <td class="col-xs-2" align="center">ทีม</td>
                @foreach($team_math[$line] as $k=> $team)
                <td class="col-xs-2">
                <div class="media">
                    <div class="media-left media-middle">
                        <div style="width: 10px;
                        height: 10px;
                        background: #{{$color_team[$line][$k]}};
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 50px;"></div>
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
                <td>
                    ชนะ {{$score_team[$line][$team]['total']}} set <br>
                    คะแนนรวม {{$score_team[$line][$team]['score']}}
                </td>
                <td>
                <div class="media">
                    
                    <div class="media-left media-middle">
                        <div style="width: 10px;
                        height: 10px;
                        background: #{{$color_team[$line][$team]}};
                        -moz-border-radius: 2px;
                        -webkit-border-radius: 2px;
                        border-radius: 50px;"></div>
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
                    <td align="center">
                        @if($m['match_status'] == "NOT START")
                            {{$m['match_number']}}<br>
                            <span class="label label-info">{{$m['time_stamp']}}</span>
                        @else

                        <div class="media">
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
                                    <div style="width: 10px;
                                    height: 10px;
                                    background: #{{$color_team[$line][$m['match_team_1']]}};
                                    -moz-border-radius: 2px;
                                    -webkit-border-radius: 2px;
                                    border-radius: 50px;"></div>
                                </div>
                            @endif
                            @if($win[$m['match_team_2']] == 2)
                                <div class="media-left media-middle">
                                    <div style="width: 10px;
                                    height: 10px;
                                    background: #{{$color_team[$line][$m['match_team_2']]}};
                                    -moz-border-radius: 2px;
                                    -webkit-border-radius: 2px;
                                    border-radius: 50px;"></div>
                                </div>
                            @endif
                            <div class="media-body">
                            @foreach($m['score'] as $score)
                                {{$score['set_score_team_1']}} - {{$score['set_score_team_2']}}<br>
                            @endforeach
                            </div>
                        </div>
                        @endif
                    </td>
                    @else
                    <td style="background-color:#e6e6e6"></td>
                    @endif
                
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-xs-1"></div>
</div>
@endif
@endforeach